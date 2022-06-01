<?php

use yii\helpers\Html;

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline" style="padding:15px;">

            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td rowspan="9" colspan="2">
                            <img src="<?= Yii::$app->request->hostInfo . $model->imagen ?>" width="350" />
                        </td>
                        <td width="200px"><b>Codigo:</b></td>
                        <td><?= $model->cod_paciente ?></td>
                    </tr>
                    <tr>
                        <td><b>Nombre:</b></td>
                        <td><?= $model->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Representante:</b></td>
                        <td><?= $model->representante->nombreCompleto ?></td>
                    </tr>
                    <tr>
                        <td><b>Especie:</b></td>
                        <td><?= $model->especie->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Raza:</b></td>
                        <td><?= $model->raza->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Sexo:</b></td>
                        <td>
                            <?= $model->sexo == 'M' ? "Macho" : "Hembra"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Color:</b></td>
                        <td><?= $model->color ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha de nacimiento:</b></td>
                        <td><?= date('d-m-Y', strtotime($model->fecha_nac)) ?></td>
                    </tr>
                    <tr>
                        <td><b>Estado:</b></td>
                        <td>
                            <span class="badge bg-<?= $model->activo == 1 ? "green" : "red"; ?>"><?= $model->activo == 1 ? "Activo" : "Inactivo"; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Caracteristicas:</b></td>
                        <td colspan="3"><?= $model->caracteristicas ?></td>
                    </tr>
                    <tr>
                        <td><b>Alergias:</b></td>
                        <td colspan="3"><?= $model->alergias ?></td>
                    </tr>
                    <tr>
                        <td><b>Lista de vacunas:</b></td>
                        <td>
                            <?php if ($vacunas) { ?>
                                <?php $n = 1;
                                foreach ($vacunas as $vacuna) { ?>
                                    <?php echo $n . ' - ' . $vacuna->vacuna->nombre; ?><br />
                                <?php $n++;
                                } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Creado por: </b></td>
                        <td><?= $model->userIng->nombreCompleto ?></td>
                        <td><b>Modificado por: </b></td>
                        <td><?= $model->userMod->nombreCompleto ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_paciente' => $model->id_paciente], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>