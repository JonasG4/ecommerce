<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_stock')->textInput() ?>

    <?= $form->field($model, 'fecha_ing')->textInput() ?>

    <?= $form->field($model, 'user_ing')->textInput() ?>

    <?= $form->field($model, 'fecha_mod')->textInput() ?>

    <?= $form->field($model, 'user_mod')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
