<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblInventario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-inventario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_compra')->textInput() ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'cant_original')->textInput() ?>

    <?= $form->field($model, 'numero_ingreso')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
