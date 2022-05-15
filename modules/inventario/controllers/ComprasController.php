<?php

namespace app\modules\inventario\controllers;

use app\models\TblCompras;
use app\models\TblDetCompras;
use app\models\TblInventario;
use app\modules\inventario\models\ComprasSearch;
use app\modules\inventario\models\DetComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComprasController implements the CRUD actions for TblCompras model.
 */
class ComprasController extends Controller
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
     * Lists all TblCompras models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCompras model.
     * @param int $id_compra Id Compra
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_compra)
    {
        $searchModel = new DetComprasSearch();
        $searchModel->id_compra = $id_compra;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id_compra),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TblCompras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblCompras();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_compra' => $model->id_compra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionInventario($id_compra)
    {
        $detCompra = TblDetCompras::find()->where('id_compra = ' . $id_compra)->all();

        foreach ($detCompra as $det){
            $modelInventario = new TblInventario();
            $modelInventario->id_compra = $id_compra;
            $modelInventario->id_producto = $det->id_producto;
            $modelInventario->cantidad = $det->cantidad;
            $modelInventario->cant_original = $det->cantidad;
            $modelInventario->numero_ingreso = 'INV-#####';
            $modelInventario->save();
        }

        return $this->redirect(['view', 'id_compra' => $id_compra]);
    }

    /**
     * Updates an existing TblCompras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_compra Id Compra
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_compra)
    {
        $model = $this->findModel($id_compra);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_compra' => $model->id_compra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblCompras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_compra Id Compra
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_compra)
    {
        $this->findModel($id_compra)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblCompras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_compra Id Compra
     * @return TblCompras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_compra)
    {
        if (($model = TblCompras::findOne(['id_compra' => $id_compra])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
