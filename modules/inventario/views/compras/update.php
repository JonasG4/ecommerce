<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompras */

$this->title = 'Update Tbl Compras: ' . $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_compra, 'url' => ['view', 'id_compra' => $model->id_compra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-compras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
