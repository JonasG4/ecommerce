<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategorias */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h3 class="card-title">Crear / Editar Inventario</h3>
        </div>
        <?php $form = ActiveForm::begin(['type' => 
        ActiveForm::TYPE_HORIZONTAL]); ?>
        <div class="card-body">
            <form role="form">
                <div class="row">
                    <div class="col-md-12">
                        <?= Html::activeLabel($model, 'nombre', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'nombre', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= Html::activeLabel($model, 'descripcion', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'descripcion', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="card-footer">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                </div>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
