<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use kartik\form\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\AboutSchool $model */
/** @var yii\widgets\ActiveForm $form */
// use kartik\icons\FontAwesomeAsset;
// FontAwesomeAsset::register($this);
?>

<div class="about-school-form">

    
    <div class="card">
        <div class="card-header">
            <h4 class="text-olive"><i class="fa fa-edit"></i> About Us</h4> 
        </div>
        <div class="card-body table-responsive">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>

            <?php 
                echo $form->field($model, 'body')->widget(\kartik\editors\Summernote::class, [
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

            <div class="form-group text-center">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>  

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
