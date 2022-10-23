<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblInventario $model */

$this->title = 'Crear Inventario';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-inventario-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
