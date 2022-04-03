<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblEspecies */

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'id_raza' => $model->id_especie]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="tbl-especies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
