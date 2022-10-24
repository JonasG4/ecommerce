<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */

$this->title = 'Detalles';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-productos-view">
    <div class="row">
        <div class="col-md-12">
            <h1 class="font-weight-bold">
                <?= $this->title ?>
            </h1>
            <div class="card card-primary card-outline p-4">
                <div class="row">
                    <div class="col-md-12 p-2 bg-primary rounded mb-3">
                        <h1 class="card-title font-weight-bolder">
                            <?= $model->nombre?>
                        </h1>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex flex-column gap-2 rounded p-3" style="background-color: #f1f1f1">
                            <img src="<?= Yii::$app->request->hostInfo . $imagenes[0]->imagen ?>" width="300" style="max-height: 300px; object-fit: cover" class="mb-2">
                            <div class="d-flex w-100">
                                <?php
                            for ($i = 1; $i < count($imagenes); $i++) : ?>
                                <img src="<?= Yii::$app->request->hostInfo . $imagenes[$i]->imagen ?>" width="100" class="mr-2"  style="object-fit: cover">
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Categoria</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->categoria->nombre?></div>

                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Descripcion</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->descripcion?></div>

                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Precio</div>
                                <div class="col-md-10 p-2 rounded" style="background-color: #f1f1f1">$<?= $model->precio?></div>

                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Categoria</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->categoria->nombre?></div>
                      
                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Stock minimo</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->min_stock?></div>

                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Fecha de ingreso</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->fecha_ing?></div>
                               
                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Ingresado por</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->userIng->nombreCompleto?></div>
                               
                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Fecha de modificacion</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->fecha_mod?></div>
                               
                                <div class="col-md-2 bg-primary p-2 rounded mb-2">Modificado por:</div>
                                <div class="col-md-10 p-2 rounded mb-2" style="background-color: #f1f1f1"><?= $model->userMod->nombreCompleto?></div>
                            </div>  
                    </div>
                    <div class="card-footer col-md-12 mt-2">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_producto' => $model->id_producto], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_producto' => $model->id_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_producto' => $model->id_producto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_producto',
            'id_categoria',
            'nombre',
            'precio',
            'descripcion:ntext',
            'id_imagenes',
            'min_stock',
            'fecha_ing',
            'user_ing',
            'fecha_mod',
            'user_mod',
            'estado',
        ],
    ]) ?> -->

</div>