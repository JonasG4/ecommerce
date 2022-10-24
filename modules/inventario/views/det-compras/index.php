<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\DetComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Det Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-det-compras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Det Compras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_det_compra',
            'id_compra',
            'id_producto',
            'precio',
            'cantidad',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, TblDetCompras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_det_compra' => $model->id_det_compra]);
                 }
            ],
        ],
    ]); ?>


</div>
