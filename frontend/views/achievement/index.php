<?php

use app\models\Achievement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;
/** @var yii\web\View $this */
/** @var app\models\AchievementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


?>
<div class="achievement-index">

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-olive"><i class="fa fa-trophy"></i> Add Achievements</h4> 
                </div>
                <div class="card-body">

                    <div class="achievement-form">

                        <?php $form = ActiveForm::begin(['id'=>'achieve','options'=>['enctype' => 'multipart/form-data']]); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'achieveimg')->fileInput() ?> 
                            
                                <?php $url = (isset($model->photo))?$model->photo: "docs/upload.png"?>  
                            </div>
                            <div class="col-md-6">
                                <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 100%;">     
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php

                                    echo $form->field($model, 'achievement_info')->widget(\kartik\editors\Summernote::class, [
                                    'options' => ['placeholder' => 'Edit your content here...'],
                                    'container' => [
                                                    'class' => 'kv-editor-container',
                                                    ],
                                    'pluginOptions' => [
                                                        'height' => 300, // Set editor height
                                                        'toolbar' => [
                                                            ['style1', ['style']],
                                                            ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                                                            ['font', ['fontname', 'fontsize', 'color', 'clear']],
                                                            ['para', ['ul', 'ol', 'paragraph', 'height']],
                                                            // ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                                                        ]
                                                    ]
                                ]);

                                ?>    
                            </div>
                        </div>
                         
                        <div class="form-group text-center">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                    
                </div>
            </div>        
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            // 'photo',
                            [
                              'attribute' =>'photo',
                              'value' => function ($model) {
                                  $photo= Achievement::find()->where(['photo'=>$model->photo])->one();
                                if($photo){
                                 return "docs/achieve/".$photo->photo;
                                } else{
                                  return  "NULL";
                                }
                              },
                              'format' => ['image',['height'=>'75','style'=>'border-radius:5px;object-fit:contain;']],
                              'label' => 'Photo',
                              'filter'=>'',
                            ],
                            
                            [
                                'attribute'=>'achievement_info',
                                'label'=>'Info',
                                'value' => function($model){

                                    return $model->achievement_info;
                                },
                                'format' => 'raw',
                            ],
                            // 'created_by',
                            // 'created_date',
                            //'record_status',
                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-solid
                                  fa-pen-fancy"></span>', ['achievement/update', 'id' => $model->id], ['class' => ' btn btn-warning btn-xs popup',]);  
                                          },
                                          'format' => 'raw',
                            ],

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-trash"></span>', ['website-staff-display/delete', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger','data-confirm' => 'Are you sure to delete ?','data-method' => 'post',]);  
                                        },
                                        'format' => 'raw',
                                        // 'contentOptions' => ['style'=> 'max-width: 3px'],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    th{
        white-space: nowrap;
        background: #dbfca2;
    }
    th>a{

        color: #548009;
    }
    .control-label{

        color: gray;
        font-size: 14px;
    }
    .help-block{

        color: red;
    }

    .modal-header{
      background: #1fc467;
    }
</style>

<?php
$this->registerJS('


$(document).on("change","#achievement-achieveimg",function(){
         
    var image = document.getElementById("picture");
    image.src = URL.createObjectURL(event.target.files[0]);

});

');


?>
