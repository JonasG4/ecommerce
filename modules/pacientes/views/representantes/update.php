<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblRepresentantes */

$this->title = 'Update Tbl Representantes: ' . $model->id_representante;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_representante, 'url' => ['view', 'id_representante' => $model->id_representante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-representantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
