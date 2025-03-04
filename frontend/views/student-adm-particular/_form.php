<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentAdmParticular $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-adm-particular-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'particular_name')->textInput(['maxlength' => true]) ?>     
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'due_amount')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Add', ['class' => 'btn btn-sm btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
