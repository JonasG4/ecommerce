<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
    ]) ?>

</div>
