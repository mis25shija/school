<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Achievement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="achievement-form">
    <p>
        <?= Html::a("<span class = 'fa fa-backward'></span> Back", ['/achievement'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?php $form = ActiveForm::begin(['id'=>'achieve','options'=>['enctype' => 'multipart/form-data']]); ?>

    <div class="card">
        <div class="card-header">
          <h4 class="text-olive"><i class="fa fa-edit"></i> Update</h4>  
        </div>
        <div class="card-body">

            <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'achieveimg')->fileInput() ?> 
        
            <?php $url = (isset($model->photo))?"docs/achieve/".$model->photo: $model->photo ?>  
        </div>
        <div class="col-md-6">
            <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style="width: 35%;">     
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