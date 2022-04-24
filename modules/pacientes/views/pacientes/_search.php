<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pacientes\models\PacientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pacientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'cod_paciente') ?>

    <?= $form->field($model, 'id_representante') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'imagen') ?>

    <?php // echo $form->field($model, 'id_especie') ?>

    <?php // echo $form->field($model, 'id_raza') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'fecha_nac') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'caracteristicas') ?>

    <?php // echo $form->field($model, 'alergias') ?>

    <?php // echo $form->field($model, 'user_ing') ?>

    <?php // echo $form->field($model, 'fecha_ing') ?>

    <?php // echo $form->field($model, 'user_mod') ?>

    <?php // echo $form->field($model, 'fecha_mod') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
