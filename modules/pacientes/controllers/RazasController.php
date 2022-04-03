<?php

namespace app\modules\pacientes\controllers;

use Yii;
use Exception;
use app\models\TblRazas;
use app\modules\pacientes\models\RazasSearch;
use app\controllers\CoreController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RazasController implements the CRUD actions for TblRazas model.
 */
class RazasController extends Controller
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
     * Lists all TblRazas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RazasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblRazas model.
     * @param int $id_raza Id Raza
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_raza)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_raza),
        ]);
    }

    /**
     * Creates a new TblRazas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblRazas();

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
            return $this->redirect(['view', 'id_raza' => $model->id_raza]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblRazas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_raza Id Raza
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_raza)
    {
        $model = $this->findModel($id_raza);

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
            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['view', 'id_raza' => $model->id_raza]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblRazas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_raza Id Raza
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_raza)
    {
        $this->findModel($id_raza)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblRazas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_raza Id Raza
     * @return TblRazas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_raza)
    {
        if (($model = TblRazas::findOne(['id_raza' => $id_raza])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
