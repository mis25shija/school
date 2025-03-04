<?php

use app\models\ManagementMessages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;
/** @var yii\web\View $this */
/** @var app\models\ManagementMessagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


?>
<div class="management-messages-index">

    

        <div class="card">
            <div class="card-header">
              <h5 class="text-olive"><i class="fa fa-envelope"></i> Add Message</h5>  
            </div>
            <div class="card-body">
                <div class="management-messages-form">

                <?php $form = ActiveForm::begin(['id'=>'admin','options'=>['enctype' => 'multipart/form-data']]); ?>
                <div class="row">
                    <div class="col-md-4">
                     <?= $form->field($model, 'management')->fileInput(['maxlength' => true]) ?>
                     <?php $url = (isset($model->photo))?$model->photo: "docs/upload.png"?>   
                    </div>  
                    <div class="col-md-8">
                       <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 35%;">  
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                      
                        <?= $form->field($model, 'message_info')->widget(\kartik\editors\Summernote::class, [
                            'options' => ['placeholder' => 'Edit your content here...'],
                            'container' => [
                                            'class' => 'kv-editor-container',
                                            ],
                            'pluginOptions' => [
                                                'height' => 250, // Set editor height
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
                    <?= Html::submitButton('Add', ['class' => 'btn btn-md btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
                
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'tableOptions' => ['class'=>'table table-hover'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // 'photo',
                    [
                      'attribute' =>'photo',
                      'value' => function ($model) {
                          $photo= ManagementMessages::find()->where(['photo'=>$model->photo])->one();
                        if($photo){
                         return "docs/message/".$photo->photo;
                        } else{
                          return  "NULL";
                        }
                      },
                      'format' => ['image',['height'=>'75','style'=>'border-radius:5px;object-fit:contain;']],
                      'label' => 'Photo',
                      'filter'=>'',
                    ],
                    
                    [
                        'attribute' => 'message_info',
                        'label' => 'Message',
                        'value' => function($model){

                            return $model->message_info;
                        },
                        'format' =>'raw',
                    ],

                    // 'created_by',
                    // 'created_date',
                    //'record_status',
                    [
                      'value' => function ($model) {
                        return Html::a('<span class="fa fa-solid
                          fa-pen-fancy"></span>', ['management-messages/update', 'id' => $model->id], ['class' => ' btn btn-warning btn-xs',]);  
                                  },
                                  'format' => 'raw',
                    ],

                    [
                      'value' => function ($model) {
                        return Html::a('<span class="fa fa-trash"></span>', ['management-messages/delete', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger','data-confirm' => 'Are you sure to delete ?','data-method' => 'post',]);  
                                },
                                'format' => 'raw',
                                // 'contentOptions' => ['style'=> 'max-width: 3px'],
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


$(document).on("change","#managementmessages-management",function(){
         
    var image = document.getElementById("picture");
    image.src = URL.createObjectURL(event.target.files[0]);

});




$(document).on("change","#carousel-mobile",function(){
           
    var image = document.getElementById("picture1");
    image.src = URL.createObjectURL(event.target.files[0]);
     
});


   $(".popup").click(function(e) {
     e.preventDefault();
     $("#jobPop").modal("show").find(".modal-body")
     .load($(this).attr("href"));
   });



');


?>
