<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-productos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_producto',
            'id_categoria',
            'nombre',
            'precio',
            'descripcion:ntext',
            //'id_imagenes',
            //'min_stock',
            //'fecha_ing',
            //'user_ing',
            //'fecha_mod',
            //'user_mod',
            //'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblProductos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_producto' => $model->id_producto]);
                 }
            ],
        ],
    ]); ?>


</div>
