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
                <h3 class="card-title">Compra: <?= $model->num_documento ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td><b>Numero Documento:</b></td>
                        <td><?= $model->num_documento ?></td>
                    </tr>
                    <tr>
                        <td><b>Proveedor:</b></td>
                        <td> <?= $model->proveedor->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha: </b></td>
                        <td><?= date('d-m-Y', strtotime($model->fecha)) ?></td>
                    </tr>
                    <tr>
                        <td><b>Estado: </b></td>
                        <td><span class="badge bg-<?= $model->estado == 1 ? "green" : "red"; ?>"><?= $model->estado == 1 ? "Activo" : "Inactivo"; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Creado por: </b></td>
                        <td><?= $model->userIng->nombreCompleto ?></td>
                        </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_ing)) ?></td>
                    </tr>
                    <tr>
                        <td><b>Modificado por: </b></td>
                        <td><?= $model->userMod->nombreCompleto ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_compra' => $model->id_compra], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
                <?php echo Html::a('<i class="fa fa-edit"></i> Agregar al Inventario', ['inventario', 'id_compra' => $model->id_compra], ['class' => 'btn btn-warning', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
            </div>
        </div>
    </div>
</div>

<?= $this->render('_gridDetalles', [
    'model' => $model,
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]) ?>