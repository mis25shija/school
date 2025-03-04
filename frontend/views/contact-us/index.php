<?php

use app\models\ContactUs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ContactUsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Contact uses';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-us-index">

    <div class="card">
        <div class="card-header">
            <h4 class="text-olive"><i class="fa fa-list"></i> Contact Enquiry</h4>  
        </div>
        <div class="card-body table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    
                    [
                        'attribute'=>'date',
                        'value' =>function($model){

                            return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : 'NA';
                        },
                        'filter' => \kartik\date\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'date',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose' => true,
                        ],
                    ]),
                    ],
                    'fullname',
                    'phone',
                    'email:email',
                    'message:ntext',
                    //'record_status',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{delete}', // Show only the delete button
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a(
                                    '<i class="fas fa-trash"></i>', // Delete icon
                                    $url,
                                    [
                                        'class' => 'btn btn-danger btn-xs', // Red color button
                                        'data-confirm' => 'Are you sure you want to delete this item?',
                                        'data-method' => 'post',
                                    ]
                                );
                            },
                        ],
                        'urlCreator' => function ($action, ContactUs $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>    
        </div>
    </div>
</div>

<style type="text/css">
    .table th{
        white-space: nowrap;
        background: #dbfca2;
    }
    th>a{

        color: #548009;
    }
    
</style>
