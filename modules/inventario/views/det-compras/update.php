<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblDetCompras */

$this->title = 'Update Tbl Det Compras: ' . $model->id_det_compra;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Det Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_det_compra, 'url' => ['view', 'id_det_compra' => $model->id_det_compra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-det-compras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
