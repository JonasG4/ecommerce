<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pacientes\models\RepresentantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-representantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_representante') ?>

    <?= $form->field($model, 'cod_representante') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'id_departamento') ?>

    <?php // echo $form->field($model, 'id_municipio') ?>

    <?php // echo $form->field($model, 'dui') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'correo_electronico') ?>

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
