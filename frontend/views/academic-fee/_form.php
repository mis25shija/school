<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcademicFee $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="academic-fee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'academic_fee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'academic_fee_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_info_id')->textInput() ?>

    <?= $form->field($model, 'session_id')->textInput() ?>

    <?= $form->field($model, 'fine_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fee_last_date')->textInput() ?>

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
