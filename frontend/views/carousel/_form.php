<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Carousel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carousel-form">

    <?php $form = ActiveForm::begin(['id'=>'bannerupdate','options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'web')->fileInput(['id' => 'desktop'])->label('Upload Desktop Banner') ?>
    <?php $url = (isset($model->desktop_format))? "docs/banner/".$model->desktop_format : $model->desktop_format ?>
    <img id="img" class="mx-auto d-block" src=<?=$url ?>  style="width: 30%;"> 


    <br>


 
   <?= $form->field($model, 'mobile')->fileInput(['id' => 'mobile'])->label('Upload Mobile Banner') ?> 

    <?php $url = (isset($model->mobile_format))? "docs/banner/".$model->mobile_format : $model->mobile_format ?>
    <img id="img1" class="mx-auto d-block" src=<?=$url ?>  style="width: 30%;"> 

    <br><br>

    <div class="form-group text-center">
        <?= Html::submitButton('Update', ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJS('


$(document).on("change","#desktop",function(){
      
        var myImg = this.files[0];
      
        var image = document.getElementById("img");
        image.src = URL.createObjectURL(event.target.files[0]);



});




$(document).on("change","#mobile",function(){
      
        var myImg = this.files[0];

        var image = document.getElementById("img1");
        image.src = URL.createObjectURL(event.target.files[0]);
 


});



');


?>
