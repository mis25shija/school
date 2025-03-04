<?php

use app\models\Carousel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
/** @var yii\web\View $this */
/** @var app\models\CarouselSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="carousel-index">

    <div class="row">
        <div class="col-md-5">

            <div class="card">

                <div class="card-header">
                    <h5 class="text-olive"><i class="fa fa-image"></i> Add Banner</h5>
                </div>
                <div class="card-body">

                    <div class="carousel-form">

                        <?php $form = ActiveForm::begin(['id'=>'banner','options'=>['enctype' => 'multipart/form-data']]); ?>

                        <?= $form->field($model, 'web')->fileInput()->label('Desktop Format') ?> 
                            
                        <?php $url = (isset($model->desktop_format))?$model->desktop_format: "docs/upload.png"?>
                        <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 35%;"> 
                    
                        <br>
                 
                     
                       <?= $form->field($model, 'mobile')->fileInput()->label('Mobile Format') ?> 
                    
                        <?php $url = (isset($model->mobile_format))?$model->mobile_format: "docs/upload.png"?>
                        <img id="picture1" class="mx-auto d-block" src=<?=$url ?>  style="width: 35%;">

                        <br>

                        <div class="form-group">
                            <?= Html::submitButton('Upload', ['class' => 'btn btn-block btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                    
                </div>
            </div>
     
        </div>
        <div class="col-md-7">

            <div class="card">
                
                <div class=" card-body table-responsive">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            // 'desktop_format',
                            // 'mobile_format',

                            [
                              'attribute' =>'desktop_format',
                              'value' => function ($model) {
                                  $photo= Carousel::find()->where(['desktop_format'=>$model->desktop_format])->one();
                                if($photo){
                                 return "docs/banner/".$photo->desktop_format;
                                } else{
                                  return  "NULL";
                                }
                              },
                              'format' => ['image',['height'=>'80','style'=>'border-radius:5px;object-fit:contain;border:solid 1px yellow']],
                              'label' => 'Carousel Web Image',
                              'filter'=>'',
                            ],
                               
                            [
                              'attribute' =>'mobile_format',
                              'value' => function ($model) {
                                  $photo= Carousel::find()->where(['mobile_format'=>$model->mobile_format])->one();
                                if($photo){
                                 return "docs/banner/".$photo->mobile_format;
                                } else{
                                  return  "NULL";
                                }
                              },
                              'format' => ['image',['height'=>'80','style'=>'border-radius:5px;object-fit:contain;border:solid 1px yellow']],
                              
                              'label' => 'Carousel Mobile Image',
                              'filter'=>'',
                            ],
                            // 'created_by',
                            // 'created_date',
                            //'record_status',
                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-solid
                                  fa-pen-fancy"></span>', ['carousel/update', 'id' => $model->id], ['class' => ' btn btn-warning btn-xs popup',]);  
                                          },
                                          'format' => 'raw',
                            ],

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-trash"></span>', ['carousel/delete', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger','data-confirm' => 'Are you sure to delete ?','data-method' => 'post',]);  
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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

                  'title' => '<h4 class = "text-light">Carousel Image</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-md',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>


<?php
$this->registerJS('


$(document).on("change","#carousel-web",function(){
         
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
