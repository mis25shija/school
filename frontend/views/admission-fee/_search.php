<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AdmissionFeeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admission-fee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'new_student_adm_fee') ?>

    <?= $form->field($model, 'old_student_adm_fee') ?>

    <?= $form->field($model, 'class_info_id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?php // echo $form->field($model, 'fine_amount') ?>

    <?php // echo $form->field($model, 'adm_last_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
