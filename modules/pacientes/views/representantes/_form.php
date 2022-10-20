<?php

use app\models\TblDepartamentos;
use app\models\TblMunicipios;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
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
            <?php $form = ActiveForm::begin(['id' => 'form-representante']); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'nombre', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'nombre', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'apellido', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'apellido', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'direcccion', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'direccion', ['showLabels' => false])->textarea(['rows' => 2]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'dui', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'dui', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'telefono', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'telefono', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'correo_electronico', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'correo_electronico', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'id_departamento', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_departamento', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TblDepartamentos::find()->all(), 'id_departamento', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Departamento -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>


                        <div class="col-md-6">
                            <?= Html::hiddenInput('model_id1', $model->isNewRecord ? '' : $model->id_departamento, ['id' => 'model_id1']); ?>
                            <?= Html::activeLabel($model, 'id_municipio', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'id_municipio', ['showLabels' => false])->widget(DepDrop::class, [
                                'language' => 'es',
                                'type' => DepDrop::TYPE_SELECT2,
                                'pluginOptions' => [
                                    'depends' => ['tblrepresentantes-id_departamento'],
                                    'initialize' => $model->isNewRecord ? false : true,
                                    'url' => Url::to(['/pacientes/representantes/municipios']),
                                    'placeholder' => '- Seleccionar Municipio -',
                                    'loadingText' => 'Cargando datos...',
                                    'params' => ['model_id1'] ///SPECIFYING THE PARAM
                                ]
                            ]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'activo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'activo', ['showLabels' => false])->label('visible')->radioList(
                                [0 => 'Inactivo', 1 => 'Activo'],
                                ['custom' => true, 'inline' => true, 'id' => 'custom-radio-list-inline']
                            ); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'submit-button']) ?>
                        <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                    </div>
                </form>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>