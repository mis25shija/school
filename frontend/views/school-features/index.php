<?php

use app\models\SchoolFeatures;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
/** @var yii\web\View $this */
/** @var app\models\SchoolFeaturesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'School Features';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-features-index">

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                   <h4 class="text-olive"><i class="fa fa-tasks"></i> Add Features</h4> 
                </div>
                <div class="card-body">

                    <div class="school-features-form">

                        <?php $form = ActiveForm::begin(['id'=>'feature','options'=>['enctype' => 'multipart/form-data']]); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <?= $form->field($model, 'icn')->fileInput()->label('Icon') ?> 
                            
                                <?php $url = (isset($model->icon))?$model->icon: "docs/upload.png"?>  
                            </div>
                            <div class="col-md-6">
                                <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 20%;">   
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                              <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>  
                            </div>
                            <div class="col-md-6">
                               <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?> 
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            
                            [
                              'attribute' =>'icon',
                              'value' => function ($model) {
                                  $photo= SchoolFeatures::find()->where(['icon'=>$model->icon])->one();
                                if($photo){
                                 return "docs/featureicon/".$photo->icon;
                                } else{
                                  return  "NULL";
                                }
                              },
                              'format' => ['image',['height'=>'75','style'=>'border-radius:5px;object-fit:contain;']],
                              'label' => 'Icon',
                              'filter'=>'',
                            ],
                            'title',
                            'content',
                            // 'created_by',
                            //'created_date',
                            //'record_status',
                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-solid
                                  fa-pen-fancy"></span>', ['school-features/update', 'id' => $model->id], ['class' => ' btn btn-warning btn-xs popup',]);  
                                          },
                                          'format' => 'raw',
                            ],

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-trash"></span>', ['school-features/delete', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger','data-confirm' => 'Are you sure to delete ?','data-method' => 'post',]);  
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

        Modal::begin([

                  'title' => '<h4 class = "text-light">Update Feature</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-lg',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>


<?php
$this->registerJS('


$(document).on("change","#schoolfeatures-icn",function(){
         
    var image = document.getElementById("picture");
    image.src = URL.createObjectURL(event.target.files[0]);

});




$(document).on("change","#icon",function(){
           
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
