<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblInventario */

$this->title = 'Update Tbl Inventario: ' . $model->id_inventario;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inventario, 'url' => ['view', 'id_inventario' => $model->id_inventario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-inventario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
