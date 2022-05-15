<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblDetCompras */

$this->title = 'Create Tbl Det Compras';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Det Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-det-compras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
