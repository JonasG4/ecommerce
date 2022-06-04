<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPacientes */


$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'id_especie' => $model->id_especie]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tbl-pacientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'vacunas' => $vacunas,
    ]) ?>

</div>
