<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\DetComprasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-det-compras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_det_compra') ?>

    <?= $form->field($model, 'id_compra') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'cantidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
