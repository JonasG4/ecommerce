<?php

namespace app\modules\inventario\controllers;

use app\controllers\CoreController;
use app\models\TblProductoImagenes;
use app\models\TblProductos;
use app\modules\inventario\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use Exception;

/**
 * ProductosController implements the CRUD actions for TblProductos model.
 */
class ProductosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TblProductos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblProductos model.
     * @param int $id_producto Id Producto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_producto)
    {
        $imagenes = TblProductoImagenes::find(['id_producto' => $id_producto])->all();
        return $this->render('view', [
            'model' => $this->findModel($id_producto),
            'imagenes' => $imagenes
        ]);
    }

    /**
     * Creates a new TblProductos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblProductos();
        $modelImagen = new TblProductoImagenes();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            $imagenes = UploadedFile::getInstances($modelImagen, 'imagen');

            try {

                $model->id_categoria = 1;
                $model->fecha_ing = date('Y-m-d H:i:s');
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_ing = \Yii::$app->user->identity->id;
                $model->user_mod = \Yii::$app->user->identity->id;

                if (!$model->save()) {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }

                if (empty($imagenes)) {
                    // $name = $this->request->baseUrl . '/pacientes/sin_imagen.jpg';
                    // $modelImagen->imagen = $name;
                } else {
                    foreach ($imagenes as $imagen) {
                        $modelImage2 = new TblProductoImagenes();
                        $tmp = explode(".", $imagen->name);
                        $ext = end($tmp);
                        $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                        $relativePath = Yii::$app->basePath . '/web/productos/' . $name;
                        $path = Yii::$app->request->baseUrl . '/productos/' . $name;
                        $modelImage2->imagen = $path;
                        $modelImage2->id_producto = $model->id_producto;

                        if (!$modelImage2->save()) {
                            throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($modelImagen->getErrors(), 0, false)));
                        }
                        $imagen->saveAs($relativePath);
                    }
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('succes', 'Registro creado exitosamente');
            return $this->redirect(['view', 'id_producto' => $model->id_producto]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelImagen' => $modelImagen
            ]);
        }
    }


    /**
     * Updates an existing TblProductos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_producto Id Producto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_producto)
    {
        $model = $this->findModel($id_producto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_producto' => $model->id_producto]);
        }

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_mod = \Yii::$app->user->identity->id;

                if (!$model->save()) {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }

                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('succes', 'Registro creado exitosamente');
            return $this->redirect(['view', 'id_producto' => $model->id_producto]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelImagen' => new TblProductoImagenes()
            ]);
        }
    }

    /**
     * Deletes an existing TblProductos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_producto Id Producto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_producto)
    {
        $this->findModel($id_producto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblProductos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_producto Id Producto
     * @return TblProductos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_producto)
    {
        if (($model = TblProductos::findOne(['id_producto' => $id_producto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
