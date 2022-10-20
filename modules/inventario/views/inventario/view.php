<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblInventario */

$this->title = $model->id_inventario;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-inventario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_inventario' => $model->id_inventario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_inventario' => $model->id_inventario], [
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
            'id_inventario',
            'id_compra',
            'id_producto',
            'cantidad',
            'cant_original',
            'numero_ingreso',
        ],
    ]) ?>

</div>
