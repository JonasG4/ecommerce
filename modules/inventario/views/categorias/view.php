<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategorias */

$this->title = "Listado de categorias";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-categorias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_categoria' => $model->id_categoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_categoria' => $model->id_categoria], [
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
            'id_categoria',
            'nombre',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
