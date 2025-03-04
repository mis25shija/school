<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SchoolFeatures $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="features-form">

    <?php $form = ActiveForm::begin(['id'=>'feature','options'=>['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'icn')->fileInput(['id' => 'icon'])->label('Icon') ?> 
            
                <?php $url = (isset($model->icon))? "docs/featureicon/".$model->icon : $model->icon ?>  
            </div>
            <div class="col-md-6">
                <img id="picture1" class="mx-auto d-block" src=<?=$url ?>  style="width: 40%;">   
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
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
