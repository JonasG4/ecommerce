<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblInventario $model */

$this->title = 'Create Tbl Inventario';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-inventario-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
