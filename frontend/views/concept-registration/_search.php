<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistrationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="concept-registration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?= $form->field($model, 'application_date') ?>

    <?= $form->field($model, 'student_name') ?>

    <?= $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'phone_no') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'student_aadhaar_no') ?>

    <?php // echo $form->field($model, 'general_category_id') ?>

    <?php // echo $form->field($model, 'father_name') ?>

    <?php // echo $form->field($model, 'father_occupation') ?>

    <?php // echo $form->field($model, 'father_annual_income') ?>

    <?php // echo $form->field($model, 'mother_name') ?>

    <?php // echo $form->field($model, 'mother_occupation') ?>

    <?php // echo $form->field($model, 'mother_annual_income') ?>

    <?php // echo $form->field($model, 'parent_phone') ?>

    <?php // echo $form->field($model, 'parent_alt_phone') ?>

    <?php // echo $form->field($model, 'present_address') ?>

    <?php // echo $form->field($model, 'present_district_id') ?>

    <?php // echo $form->field($model, 'present_state_id') ?>

    <?php // echo $form->field($model, 'present_pincode_id') ?>

    <?php // echo $form->field($model, 'permanent_address') ?>

    <?php // echo $form->field($model, 'permanent_district_id') ?>

    <?php // echo $form->field($model, 'permanent_state_id') ?>

    <?php // echo $form->field($model, 'permanent_pincode_id') ?>

    <?php // echo $form->field($model, 'previous_school_name') ?>

    <?php // echo $form->field($model, 'previous_school_board') ?>

    <?php // echo $form->field($model, 'payment_upload') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
