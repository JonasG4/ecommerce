<?php

namespace app\modules\pacientes\controllers;

use app\controllers\CoreController;
use Yii;
use app\models\TblMunicipios;
use app\models\TblRepresentantes;
use app\modules\pacientes\models\PacientesSearch;
use app\modules\pacientes\models\RepresentantesSearch;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * RepresentantesController implements the CRUD actions for TblRepresentantes model.
 */
class RepresentantesController extends Controller
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
     * Lists all TblRepresentantes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RepresentantesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblRepresentantes model.
     * @param int $id_representante Id Representante
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_representante)
    {
        $searchModel = new PacientesSearch();
        $searchModel->id_representante = $id_representante;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id_representante),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TblRepresentantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblRepresentantes();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->cod_representante = $this->CreateCode();
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
            return $this->redirect(['view', 'id_representante' => $model->id_representante]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateModal()
    {
        $model = new TblRepresentantes();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->cod_representante = $this->CreateCode();
                $model->fecha_ing = date('Y-m-d H:i:s');
                $model->fecha_mod = date('Y-m-d H:i:s');
                $model->user_ing = \Yii::$app->user->identity->id;
                $model->user_mod = \Yii::$app->user->identity->id;

                /*if (!$model->save()) {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }
                $transaction->commit();*/

                if ($model->save()) {
                    $transaction->commit();
                    return 1;
                } else {
                    throw new Exception(implode("<br />", \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_modal_form', [
                'model' => $model,
            ]);
        }
    }

    function CreateCode()
    {
        $representante = TblRepresentantes::find()->orderBy(['id_representante' => SORT_DESC])->one();
        if (empty($representante->cod_representante)) $codigo = 0;
        else $codigo = $representante->cod_representante;

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
        return "RP-" . $result;
    }

    /**
     * Updates an existing TblRepresentantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_representante Id Representante
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_representante)
    {
        $model = $this->findModel($id_representante);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_representante' => $model->id_representante]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblRepresentantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_representante Id Representante
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_representante)
    {
        $this->findModel($id_representante)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblRepresentantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_representante Id Representante
     * @return TblRepresentantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_representante)
    {
        if (($model = TblRepresentantes::findOne(['id_representante' => $id_representante])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMunicipios2($id)
    {
        $countMunicipios = TblMunicipios::find()
            ->where(['id_departamento' => $id])
            ->count();

        $municipios = TblMunicipios::find()
            ->where(['id_departamento' => $id])
            ->orderBy('id_municipio ASC')
            ->all();

        echo "<option>- Seleccionar Municipio -</option>";
        if ($countMunicipios > 0) {
            foreach ($municipios as $municipio) {
                echo "<option value='" . $municipio->id_municipio . "'>" . $municipio->nombre . "</option>";
            }
        }
    }

    public function actionMunicipios()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = TblMunicipios::find()->where(['id_departamento' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                //EXACTLY THIS IS THE PART YOU NEED TO IMPLEMENT:
                $selected = '';
                if (!empty($_POST['depdrop_params'])) {
                    $id1 = $_POST['depdrop_all_params']['model_id1'];
                    foreach ($list as $municipio) {
                        $out[] = ['id' => $municipio['id_municipio'], 'name' => $municipio['nombre']];
                        if ($municipio['id_municipio'] == $id1) {
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
