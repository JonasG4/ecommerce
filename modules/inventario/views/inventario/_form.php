<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblProductos

/** @var yii\web\View $this */
/** @var app\models\TblInventario $model */
/** @var yii\widgets\ActiveForm $form */
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
                        <?= Html::activeLabel($model, 'id_producto', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'id_producto', ['showLabels' => false])->widget(Select2::class, [
                            'data' => ArrayHelper::map(TblProductos::find()->all(), 'id_producto', 'nombre'),
                            'language' => 'es',
                            'options' => ['placeholder' => '- Seleccionar Producto -'],
                            'pluginOptions' => ['allowClear' => true],
                        ]); ?>
                    </div>
                    <div class="col-md-12">
                        <?= Html::activeLabel($model, 'cantidad', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'cantidad', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
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
