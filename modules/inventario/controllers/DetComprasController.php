<?php

namespace app\modules\inventario\controllers;

use app\models\TblDetCompras;
use app\modules\inventario\models\DetComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetComprasController implements the CRUD actions for TblDetCompras model.
 */
class DetComprasController extends Controller
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
     * Lists all TblDetCompras models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetComprasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblDetCompras model.
     * @param int $id_det_compra Id Det Compra
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_det_compra)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_det_compra),
        ]);
    }

    /**
     * Creates a new TblDetCompras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblDetCompras();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_det_compra' => $model->id_det_compra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblDetCompras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_det_compra Id Det Compra
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_det_compra)
    {
        $model = $this->findModel($id_det_compra);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_det_compra' => $model->id_det_compra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblDetCompras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_det_compra Id Det Compra
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_det_compra)
    {
        $this->findModel($id_det_compra)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblDetCompras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_det_compra Id Det Compra
     * @return TblDetCompras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_det_compra)
    {
        if (($model = TblDetCompras::findOne(['id_det_compra' => $id_det_compra])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
