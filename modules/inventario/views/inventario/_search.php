<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\InventarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-inventario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_inventario') ?>

    <?= $form->field($model, 'id_compra') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'cant_original') ?>

    <?php // echo $form->field($model, 'numero_ingreso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
