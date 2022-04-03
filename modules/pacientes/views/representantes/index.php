<?php

use app\models\TblRepresentantes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pacientes\models\RepresentantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Representantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-representantes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Representantes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_representante',
            'cod_representante',
            'nombre',
            'apellido',
            'direccion:ntext',
            //'id_departamento',
            //'id_municipio',
            //'dui',
            //'telefono',
            //'correo_electronico',
            //'user_ing',
            //'fecha_ing',
            //'user_mod',
            //'fecha_mod',
            //'activo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblRepresentantes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_representante' => $model->id_representante]);
                 }
            ],
        ],
    ]); ?>


</div>
