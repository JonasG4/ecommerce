<?php

use app\models\TblEspecies;
use app\models\TblRazas;
use app\models\TblRepresentantes;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\editors\Summernote;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear / Editar registro</h3>
            </div>
            <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'id_representante', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_representante', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TblRepresentantes::find()->all(), 'id_representante', 'nombreCompleto'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Representante -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'nombre', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'nombre', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                        
                        <?= Html::activeLabel($model, 'imagen', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'imagen', ['showLabels' => false])->widget(
                                FileInput::class,
                                ['options' => ['accept' => 'image/*'],]
                            ); ?>
                            <?= $form->field($model, 'imagen', ['showLabels' => false])->hiddenInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'id_especie', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_especie', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TblEspecies::find()->all(), 'id_especie', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Especie -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::hiddenInput('model_id1', $model->isNewRecord ? '' : $model->id_especie, ['id' => 'model_id1']); ?>
                            <?= Html::activeLabel($model, 'id_raza', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_raza', ['showLabels' => false])->widget(DepDrop::class, [
                                'language' => 'es',
                                'type' => DepDrop::TYPE_SELECT2,
                                'pluginOptions' => [
                                    'depends' => ['tblpacientes-id_especie'],
                                    'initialize' => $model->isNewRecord ? false : true,
                                    'url' => Url::to(['/pacientes/pacientes/razas']),
                                    'placeholder' => '- Seleccionar Raza -',
                                    'loadingText' => 'Cargando datos...',
                                    'params' => ['model_id1'] ///SPECIFYING THE PARAM
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'sexo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'sexo', ['showLabels' => false])->radioList(
                                ['M' => 'Macho', 'H' => 'Hembra',],
                                ['custom' => true, 'inline' => true, 'id' => 'custom-radio-list-inline']
                            ) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'fecha_nac', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'fecha_nac', ['showLabels' => false])->widget(DatePicker::class, [
                                'options' => ['placeholder' => 'Seleccionar fecha de nacimiento'],
                                'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-dd', 'todayHighlight' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'color', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'color', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'caracteristicas', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'caracteristicas', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 200,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'alergias', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alergias', ['showLabels' => false])->widget(Summernote::class, [
                                'useKrajeePresets' => true,
                                'container' => [
                                    'class' => 'kv-editor-container',
                                ],
                                'pluginOptions' => [
                                    'height' => 200,
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'vacunas', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'vacunas', ['showLabels' => false])->checkboxlist(ArrayHelper::map($vacunas, 'id_vacuna', 'nombre')); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'activo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'activo', ['showLabels' => false])->label('visible')->widget(SwitchInput::class, [
                                'value' => $model->activo, //checked status can change by db value
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
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>