<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblRepresentantes */

$this->title = $model->id_representante;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-representantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_representante' => $model->id_representante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_representante' => $model->id_representante], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_representante',
            'cod_representante',
            'nombre',
            'apellido',
            'direccion:ntext',
            'id_departamento',
            'id_municipio',
            'dui',
            'telefono',
            'correo_electronico',
            'user_ing',
            'fecha_ing',
            'user_mod',
            'fecha_mod',
            'activo',
        ],
    ]) ?>

</div>
