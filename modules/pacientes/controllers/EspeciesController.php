<?php

namespace app\modules\pacientes\controllers;

use app\models\TblEspecies;
use app\modules\pacientes\models\EspeciesSearch;
use app\modules\pacientes\models\RazasSearch;
use app\controllers\CoreController;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * EspeciesController implements the CRUD actions for TblEspecies model.
 */
class EspeciesController extends Controller
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
     * Lists all TblEspecies models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EspeciesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblEspecies model.
     * @param int $id_especie Id Especie
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_especie)
    {
        $searchModel = new RazasSearch();
        $searchModel->id_especie = $id_especie;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id_especie),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TblEspecies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblEspecies();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->fecha_ing = date('Y-m-d H:i:s');
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_ing = \Yii::$app->user->identity->id;
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
            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['view', 'id_especie' => $model->id_especie]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblEspecies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_especie Id Especie
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_especie)
    {
        $model = $this->findModel($id_especie);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_especie' => $model->id_especie]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblEspecies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_especie Id Especie
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_especie)
    {
        $this->findModel($id_especie)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblEspecies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_especie Id Especie
     * @return TblEspecies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_especie)
    {
        if (($model = TblEspecies::findOne(['id_especie' => $id_especie])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
