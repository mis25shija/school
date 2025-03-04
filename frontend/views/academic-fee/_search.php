<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcademicFeeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="academic-fee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'academic_fee_name') ?>

    <?= $form->field($model, 'academic_fee_amount') ?>

    <?= $form->field($model, 'class_info_id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?php // echo $form->field($model, 'fine_amount') ?>

    <?php // echo $form->field($model, 'fee_last_date') ?>

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
