<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\InventarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Inventarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-inventario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Inventario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inventario',
            'id_compra',
            'id_producto',
            'cantidad',
            'cant_original',
            //'numero_ingreso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblInventario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_inventario' => $model->id_inventario]);
                 }
            ],
        ],
    ]); ?>


</div>
