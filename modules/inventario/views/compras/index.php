<?php

use app\models\TblCompras;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\ComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-compras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Compras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_compra',
            'id_proveedor',
            'fecha',
            'num_documento',
            'fecha_ing',
            //'user_ing',
            //'fecha_mod',
            //'user_mod',
            //'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblCompras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_compra' => $model->id_compra]);
                }
            ],
        ],
    ]); ?>


</div>