<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProductos */

$this->title = 'Create Tbl Productos';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
