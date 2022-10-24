<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */

$this->title = 'Actualizar registro';   
$this->params['breadcrumbs'][] = ['label' => 'Tbl Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id_producto' => $model->id_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelImagen' => $modelImagen
    ]) ?>

</div>
