<?php

/**
 * @link https://jrguevara.github.io.net
 * @copyright Copyright (c) 2022 jrCoding
 * @license https://www.yiiframework.com/license/
 */

namespace app\modules\pacientes\controllers;

use app\controllers\CoreController;
use app\models\TblPacientes;
use app\models\TblPacientesVacunas;
use app\models\TblRazas;
use app\models\TblVacunas;
use app\modules\pacientes\models\PacientesSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * PacientesController implementa las operaciones CRUD para el modelo TblPacientes.
 * @author Jaime Guevara <jr.guevara@outlook.com>
 * @since 0.1
 */
class PacientesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lista todos los paciente en el modelo TblPacientes.
     * @return string que renderiza vista index
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
     * Despliega el registro de un solo modelo en TblPacientes.
     * @param int $id_paciente Id Paciente
     * @return string
     * @throws NotFoundHttpException si el modelo no se encuentra
     */
    public function actionView($id_paciente)
    {
        $vacunas = TblPacientesVacunas::find()->where(['id_paciente' => $id_paciente])->all();

        return $this->render('view', [
            'model' => $this->findModel($id_paciente),
            'vacunas' => $vacunas,
        ]);
    }

    /**
     * Crea una nueva instancia del modelo TblRepresentantes.
     * Si la creacion es exitosa, el navegador redirige a la pagina de vista
     * Se utiliza try y catch para implementar Transacciones con Commit y Rollback
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblPacientes();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {

                $image = UploadedFile::getInstance($model, 'imagen');
                if (empty($image)) {
                    $name = $this->request->baseUrl . '/pacientes/sin_imagen.jpg';
                    $model->imagen = $name;
                } else {
                    $tmp = explode(".", $image->name);
                    $ext = end($tmp);
                    $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                    $relativePath = Yii::$app->basePath . '/web/pacientes/' . $name;
                    $path = Yii::$app->request->baseUrl . '/pacientes/' . $name;
                    $model->imagen = $path;
                    $image->saveAs($relativePath);
                }

                $model->cod_paciente = $this->CreateCode();
                $model->fecha_ing = date('Y-m-d H:i:s');
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_ing = \Yii::$app->user->identity->id;
                $model->user_mod = \Yii::$app->user->identity->id;

                if (!$model->save()) {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }

                foreach ($_POST['TblPacientes']['vacunas'] as $idVacuna) {
                    $modelPacientesVacunas = new TblPacientesVacunas();
                    $modelPacientesVacunas->id_paciente = $model->id_paciente;
                    $modelPacientesVacunas->id_vacuna = $idVacuna;

                    if (!$modelPacientesVacunas->save()) {
                        throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                    }
                }

                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['view', 'id_paciente' => $model->id_paciente]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'vacunas' => TblVacunas::getVacunas(),
            ]);
        }
    }

    /**
     * Genera Codigo para ser utilizado en registro de TblRepresentantes actionCreate
     * @return string
     */
    function CreateCode()
    {
        $paciente = TblPacientes::find()->orderBy(['id_paciente' => SORT_DESC])->one();
        if (empty($paciente->cod_paciente)) $codigo = 0;
        else $codigo = $paciente->cod_paciente;

        $int = intval(preg_replace('/[^0-9]+/', '', $codigo), 10);
        $id = $int + 1;

        $numero = $id;
        $tmp = "";
        if ($id < 10) {
            $tmp .= "000";
            $tmp .= $id;
        } elseif ($id >= 10 && $id < 100) {
            $tmp .= "00";
            $tmp .= $id;
        } elseif ($id >= 100 && $id < 1000) {
            $tmp .= "0";
            $tmp .= $id;
        } else {
            $tmp .= $id;
        }
        $result = str_replace($id, $tmp, $numero);
        return "PA-" . $result;
    }

    /**
     * Actualiza un modelo existente de TblPacientes
     * Si la actualizacion es exitosa, el navegador redirige a la pagina de vista
     * @param int $id_paciente Id Paciente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException si el modelo no se encuentra
     */
    public function actionUpdate($id_paciente)
    {
        $model = $this->findModel($id_paciente);
        $vacunas = TblVacunas::find()->all();
        $model->vacunas = ArrayHelper::getColumn($model->getTblPacientesVacunas()->asArray()->all(), 'id_vacuna');


        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_mod = \Yii::$app->user->identity->id;

                if (!$model->save()) {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }

                \Yii::$app->db->createCommand()->delete('tbl_pacientes_vacunas', ['id_paciente' => $id_paciente])->execute();

                foreach ($_POST['TblPacientes']['vacunas'] as $idVacuna) {
                    $modelPacientesVacunas = new TblPacientesVacunas();
                    $modelPacientesVacunas->id_paciente = $model->id_paciente;
                    $modelPacientesVacunas->id_vacuna = $idVacuna;

                    if (!$modelPacientesVacunas->save()) {
                        throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                    }
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['view', 'id_paciente' => $model->id_paciente]);
        } else {

            return $this->render('update', [
                'model' => $model,
                'vacunas' => $vacunas,
            ]);
        }
    }

    /**
     * Elimina un solo registro existente del modelo TblPacientes.
     * Si se elimina correctamente, el navegador redirige a la pagina de index
     * @param int $id_paciente Id Paciente
     * @return \yii\web\Response
     * @throws NotFoundHttpException si el modelo no se encuentra
     */
    public function actionDelete($id_paciente)
    {
        $this->findModel($id_paciente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra el registro en modelo TblPacientes basado en la llave primaria
     * Si el modelo no se encuentra, una exception de tipo 404 sera lanzada
     * @param int $id_paciente Id Paciente
     * @return TblPacientes el modelo que se cargo
     * @throws NotFoundHttpException si el modelo no se encuentra
     */
    protected function findModel($id_paciente)
    {
        if (($model = TblPacientes::findOne(['id_paciente' => $id_paciente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Funcion DepDrop para mostrar Listas despegables sincronizadas
     * @return \yii\helpers\Json con la informacion para llenar la lista desplegable correspondiente
     */
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
