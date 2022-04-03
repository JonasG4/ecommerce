<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblRepresentantes */

$this->title = 'Create Tbl Representantes';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-representantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
