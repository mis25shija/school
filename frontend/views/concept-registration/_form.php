<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistration $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="concept-registration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'session_id')->textInput() ?>

    <?= $form->field($model, 'application_date')->textInput() ?>

    <?= $form->field($model, 'student_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_aadhaar_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'general_category_id')->textInput() ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_annual_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_annual_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_alt_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'present_address')->textInput() ?>

    <?= $form->field($model, 'present_district_id')->textInput() ?>

    <?= $form->field($model, 'present_state_id')->textInput() ?>

    <?= $form->field($model, 'present_pincode_id')->textInput() ?>

    <?= $form->field($model, 'permanent_address')->textInput() ?>

    <?= $form->field($model, 'permanent_district_id')->textInput() ?>

    <?= $form->field($model, 'permanent_state_id')->textInput() ?>

    <?= $form->field($model, 'permanent_pincode_id')->textInput() ?>

    <?= $form->field($model, 'previous_school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'previous_school_board')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_upload')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'record_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
