<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->nombre ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"><?= $model->nombre ?></td>
                        <td width="16%"><b>Especie:</b></td>
                        <td width="34%"> <?= $model->especie->nombre ?></td>
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
                    <td><b>Visible: </b></td>
                    <td><span class="badge bg-<?= $model->visible == 1 ? "green" : "red"; ?>"><?= $model->visible == 1 ? "Activo" : "Inactivo"; ?></span></td>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_raza' => $model->id_raza], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>