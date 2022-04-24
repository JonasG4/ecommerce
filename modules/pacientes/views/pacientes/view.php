<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblPacientes */

$this->title = $model->id_paciente;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-pacientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_paciente' => $model->id_paciente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_paciente' => $model->id_paciente], [
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
            'id_paciente',
            'cod_paciente',
            'id_representante',
            'nombre',
            'imagen',
            'id_especie',
            'id_raza',
            'sexo',
            'fecha_nac',
            'color',
            'caracteristicas:ntext',
            'alergias:ntext',
            'user_ing',
            'fecha_ing',
            'user_mod',
            'fecha_mod',
            'activo',
        ],
    ]) ?>

</div>
