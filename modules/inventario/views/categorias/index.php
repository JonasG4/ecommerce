<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Categorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categoria',
            'nombre',
            'descripcion:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblCategorias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_categoria' => $model->id_categoria]);
                 }
            ],
        ],
    ]); ?>


</div>
