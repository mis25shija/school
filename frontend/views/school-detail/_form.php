<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SchoolDetail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="school-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'school_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_alt_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cut_off_attendence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_no_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admission_no_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receipt_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'record_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
