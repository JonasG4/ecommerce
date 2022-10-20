<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategorias */

$this->title = 'Update Tbl Categorias: ' . $model->id_categoria;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria, 'url' => ['view', 'id_categoria' => $model->id_categoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
