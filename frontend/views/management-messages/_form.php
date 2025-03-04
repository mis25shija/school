<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;
/** @var yii\web\View $this */
/** @var app\models\ManagementMessages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="management-messages-form">

    <?php $form = ActiveForm::begin(['id'=>'adminupdate','options'=>['enctype' => 'multipart/form-data']]); ?>

    <p>
        <?= Html::a("<span class = 'fa fa-backward'></span> Back", ['/management-messages'], ['class' => 'btn btn-danger']) ?>
    </p>
    <div class="card">
        <div class="card-header">
           <h4 class="text-center text-olive" style="font-weight: bold">Update</h4> 
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'management')->fileInput(['maxlength' => true]) ?>
                     <?php $url = (isset($model->photo))?"docs/message/".$model->photo: $model->photo?>    
                </div>
                <div class="col-md-6">
                    <img id="picture1" class="mx-auto d-block" src=<?=$url ?>  style="width: 35%;">
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
                <?= Html::submitButton('Update', ['class' => 'btn btn-warning']) ?>
            </div>
            
        </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>

<style type="text/css">
   
    .control-label{

        color: gray;
        font-size: 14px;
    }
    .help-block{

        color: red;
    }
</style>

<?php
$this->registerJS('

$(document).on("change","#managementmessages-management",function(){
           
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
