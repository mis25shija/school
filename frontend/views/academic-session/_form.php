<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcademicSession $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="academic-session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'session_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_info_id')->textInput() ?>

    <?= $form->field($model, 'session_start_date')->textInput() ?>

    <?= $form->field($model, 'session_end_date')->textInput() ?>

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
