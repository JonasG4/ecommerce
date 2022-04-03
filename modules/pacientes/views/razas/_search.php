<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pacientes\models\RazasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-razas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_raza') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'id_especie') ?>

    <?= $form->field($model, 'user_ing') ?>

    <?= $form->field($model, 'fecha_ing') ?>

    <?php // echo $form->field($model, 'user_mod') ?>

    <?php // echo $form->field($model, 'fecha_mod') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
