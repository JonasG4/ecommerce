<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\ProductosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-productos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_categoria') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'id_imagenes') ?>

    <?php // echo $form->field($model, 'min_stock') ?>

    <?php // echo $form->field($model, 'fecha_ing') ?>

    <?php // echo $form->field($model, 'user_ing') ?>

    <?php // echo $form->field($model, 'fecha_mod') ?>

    <?php // echo $form->field($model, 'user_mod') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
