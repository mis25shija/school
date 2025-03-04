<?php

use app\models\WebsiteStaffDisplay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
/** @var yii\web\View $this */
/** @var app\models\WebsiteStaffDisplaySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Website Staff Displays';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-staff-display-index">


    <div class="card">
        <div class="card-header">
            <h4 class="text-olive"><i class="fa fa-id-card"></i> Add Staff</h4>  
        </div>
        <div class="card-body">

            <div class="website-staff-display-form">

                <?php $form = ActiveForm::begin(['id'=>'feature','options'=>['enctype' => 'multipart/form-data']]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5"> 
                        <?= $form->field($model, 'staffimg')->fileInput()->label('Staff Photo') ?> 
                            
                        <?php $url = (isset($model->staff_photo))?$model->staff_photo: "docs/upload.png"?> 
                    </div>
                    <div class="col-md-7">
                        <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 30%;">  
                    </div>
                </div>  

                <div class="form-group text-center">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'staff_name',
                    // 'staff_photo',
                    [
                      'attribute' =>'staff_photo',
                      'value' => function ($model) {
                          $photo= WebsiteStaffDisplay::find()->where(['staff_photo'=>$model->staff_photo])->one();
                        if($photo){
                         return "docs/staffimg/".$photo->staff_photo;
                        } else{
                          return  "NULL";
                        }
                      },
                      'format' => ['image',['height'=>'75','style'=>'border-radius:5px;object-fit:contain;']],
                      'label' => 'Staff Photo',
                      'filter'=>'',
                    ],
                    [
                      'value' => function ($model) {
                        return Html::a('<span class="fa fa-solid
                          fa-pen-fancy"></span>', ['website-staff-display/update', 'id' => $model->id], ['class' => ' btn btn-warning btn-xs popup',]);  
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

                  'title' => '<h4 class = "text-light">Update Staff</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-lg',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>


<?php
$this->registerJS('


$(document).on("change","#websitestaffdisplay-staffimg",function(){
         
    var image = document.getElementById("picture");
    image.src = URL.createObjectURL(event.target.files[0]);

});


   $(".popup").click(function(e) {
     e.preventDefault();
     $("#jobPop").modal("show").find(".modal-body")
     .load($(this).attr("href"));
   });



');


?>

