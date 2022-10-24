<?php

use app\models\TblCategorias;
use app\models\TblProductoImagenes;
use kartik\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use kartik\editors\Summernote;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-productos-form">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear / Editar registro</h3>
                </div>
                <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL,  'options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="card-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <?= Html::activeLabel($model, 'id_categoria', ['class' => 'control-label']) ?>
                                <?= $form->field($model, 'id_categoria', ['showLabels' => false])->widget(Select2::class, [
                                    'data' => ArrayHelper::map(TblCategorias::find()->all(), 'id_categoria', 'nombre'),
                                    'language' => 'es',
                                    'options' => ['placeholder' => '- Seleccionar categoria -'],
                                    'pluginOptions' => ['allowClear' => true],
                                ]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= Html::activeLabel($model, 'nombre', ['class' => 'control-label']); ?>
                                <?= $form->field($model, 'nombre', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-12">
                                <?= Html::activeLabel($modelImagen, 'imagen', ['class' => 'control-label']) ?>
                                <h6 class="text-muted">Puede selecionar un máximo de 5 imagenes</h6>
                                <?= $form->field($modelImagen, 'imagen', ['showLabels' => false])->widget(
                                    FileInput::class,
                                    [
                                        'options' => ['accept' => 'image/*', 'multiple' => true],
                                        'pluginOptions' => [
                                            'previewFileType' => 'any',
                                            'maxFileCount' => 5,
                                            'browseLabel' => 'Seleccionar',
                                            'removeLabel' => 'Eliminar',
                                            'uploadLabel' => 'Subir',
                                            'browseIcon' => '<i class="fas fa-camera"></i> ',
                                        ],

                                    ]
                                ); ?>
                                <?= $form->field($modelImagen, 'imagen', ['showLabels' => false])->hiddenInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-12">
                                <?= Html::activeLabel($model, 'descripcion', ['class' => 'control-label']) ?>
                                <?= $form->field($model, 'descripcion', ['showLabels' => false])->widget(Summernote::class, [
                                    'useKrajeePresets' => true,
                                    'container' => [
                                        'class' => 'kv-editor-container',
                                    ],
                                    'pluginOptions' => [
                                        'height' => 200,
                                    ]
                                ]); ?>
                            </div>
                            <div class="col-md-4">
                                <?= Html::activeLabel($model, 'precio', ['class' => 'control-label']) ?>
                                <?= $form->field($model, 'precio', ['showLabels' => false])->widget(
                                    TouchSpin::class,
                                    [
                                        'name' => 't5',
                                        'pluginOptions' => [
                                            'initval' => 0.00,
                                            'min' => 0,
                                            'max' => 9999,
                                            'step' => 5,
                                            'decimals' => 2,
                                            'boostat' => 5,
                                            'maxboostedstep' => 10,
                                            'prefix' => '$',
                                            'buttonup_class' => 'btn btn-primary',
                                            'buttondown_class' => 'btn btn-info',
                                            'buttonup_txt' => '<i class="fas fa-plus-circle"></i>',
                                            'buttondown_txt' => '<i class="fas fa-minus-circle"></i>'
                                        ],
                                    ]
                                )
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?= Html::activeLabel($model, 'min_stock', ['class' => 'control-label']) ?>
                                <?= $form->field($model, 'min_stock', ['showLabels' => false])->widget(
                                    TouchSpin::class,
                                    [
                                        'name' => 't5',
                                        'pluginOptions' => [
                                            'initval' => 0,
                                            'min' => 0,
                                            'max' => 9999,
                                            'step' => 1,
                                            'boostat' => 5,
                                            'maxboostedstep' => 10,
                                            'buttonup_class' => 'btn btn-primary',
                                            'buttondown_class' => 'btn btn-info',
                                            'buttonup_txt' => '<i class="fas fa-plus-circle"></i>',
                                            'buttondown_txt' => '<i class="fas fa-minus-circle"></i>'
                                        ],
                                    ]
                                )
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?= Html::activeLabel($model, 'estado', ['class' => 'control-label']) ?>
                                <?= $form->field($model, 'estado', ['showLabels' => false])->label('visible')->widget(SwitchInput::class, [
                                    'value' => $model->estado, //checked status can change by db value
                                    'options' => ['uncheck' => 0, 'value' => 1], //value if not set ,default is 1
                                    'pluginOptions' => [
                                        'handleWidth' => 60,
                                        'onColor' => 'success',
                                        'offColor' => 'danger',
                                        'onText' => 'Activo',
                                        'offText' => 'Inactivo'
                                    ]
                                ]); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </form>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>