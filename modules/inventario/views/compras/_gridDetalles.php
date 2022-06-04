<?php
Yii::$app->language = 'es_ES';

use app\models\TblDetCompras;
use app\models\TblEspecies;
use app\models\TblPacientes;
use app\models\TblRazas;
use app\models\TblRepresentantes;
use kartik\editable\Editable;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\EditableColumn;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style']
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'id_producto',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => 'producto.nombre',
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'cantidad',
                    'editableOptions' => [
                        'header' => 'Cantidad',
                        'asPopover' => false,
                        'formOptions' => ['action' => ['/inventario/compras/editarcantidad']],
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'pluginOptions' => ['min' => 0, 'max' => 5000]
                        ]
                    ],
                    'refreshGrid' => true,
                    'hAlign' => 'right',
                    'vAlign' => 'middle',
                    'format' => ['decimal', 2],
                    'pageSummary' => true,
                    //'width'=>'20px',       
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'precio',
                    'editableOptions' => [
                        'header' => 'Precio',
                        'asPopover' => false,
                        'formOptions' => ['action' => ['/inventario/compras/editarprecio']],
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'pluginOptions' => ['min' => 0, 'max' => 5000]
                        ]
                    ],
                    'refreshGrid' => true,
                    'hAlign' => 'right',
                    'vAlign' => 'middle',
                    'format' => ['currency'],
                    'pageSummary' => true,
                    //'width'=>'20px',       
                ],
                [
                    'class' => 'kartik\grid\FormulaColumn',
                    'header' => 'Total',
                    'vAlign' => 'middle',
                    'value' => function ($model, $key, $index, $widget) {
                        $p = compact('model', 'key', 'index');
                        return  $widget->col(2, $p) * $widget->col(3, $p);
                    },
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                    'hAlign' => 'right',
                    'width' => '7%',
                    'format' => ['currency'],
                    'mergeHeader' => true,
                    'pageSummary' => true,
                    'footer' => true
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'Eliminar',
                    'template' => '{delete}',
                    'urlCreator' => function ($action, TblDetCompras $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_det_compra' => $model->id_det_compra]);
                    }
                ],
            ];

            $exportmenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_CSV => false,
                ],
            ]);

            echo GridView::widget([
                'id' => 'kv-pacientes',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['create'], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]) . ' ' .
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-success',
                                'data-pjax' => 0,
                            ]),
                        'options' => ['class' => 'btn-group mr-2']
                    ],
                    '{toggleData}',
                    $exportmenu,

                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                // parameters from the demo form
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'showPageSummary' => true,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => 'Items',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>