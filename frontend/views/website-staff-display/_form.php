<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\WebsiteStaffDisplay $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="website-staff-display-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>   
        </div>
    </div>
    <div class="row">
        <div class="col-md-5"> 
            <?= $form->field($model, 'staffimg')->fileInput(['id'=>'up'])->label('Staff Photo') ?> 
                
            <?php $url = (isset($model->staff_photo))?"docs/staffimg/".$model->staff_photo : $model->staff_photo?> 
        </div>
        <div class="col-md-7">
            <img id="picture1" class="mx-auto d-block" src=<?=$url ?>  style="width: 30%;">  
        </div>
    </div>  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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


$(document).on("change","#up",function(){
         
    var image = document.getElementById("picture1");
    image.src = URL.createObjectURL(event.target.files[0]);

});

');


?>
