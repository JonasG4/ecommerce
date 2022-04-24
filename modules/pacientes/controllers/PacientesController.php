<?php

namespace app\modules\pacientes\controllers;

use app\models\TblPacientes;
use app\models\TblRazas;
use app\modules\pacientes\models\PacientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PacientesController implements the CRUD actions for TblPacientes model.
 */
class PacientesController extends Controller
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TblPacientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PacientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPacientes model.
     * @param int $id_paciente Id Paciente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_paciente)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_paciente),
        ]);
    }

    /**
     * Creates a new TblPacientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblPacientes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_paciente' => $model->id_paciente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPacientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_paciente Id Paciente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_paciente)
    {
        $model = $this->findModel($id_paciente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_paciente' => $model->id_paciente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPacientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_paciente Id Paciente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_paciente)
    {
        $this->findModel($id_paciente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPacientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_paciente Id Paciente
     * @return TblPacientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_paciente)
    {
        if (($model = TblPacientes::findOne(['id_paciente' => $id_paciente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRazas()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = TblRazas::find()->where(['id_especie' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                //EXACTLY THIS IS THE PART YOU NEED TO IMPLEMENT:
                $selected = '';
                if (!empty($_POST['depdrop_params'])) {
                    $id1 = $_POST['depdrop_all_params']['model_id1'];
                    foreach ($list as $raza) {
                        $out[] = ['id' => $raza['id_raza'], 'name' => $raza['nombre']];
                        if ($raza['id_raza'] == $id1) {
                            $selected = $id1;
                        }
                    }
                }
                return Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        return Json::encode(['output' => '', 'selected' => '']);
    }
}
