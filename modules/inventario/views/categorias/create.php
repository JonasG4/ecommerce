<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategorias */

$this->title = 'Create Tbl Categorias';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-categorias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
