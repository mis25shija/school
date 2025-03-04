<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SchoolDetailSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="school-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'school_name') ?>

    <?= $form->field($model, 'school_photo') ?>

    <?= $form->field($model, 'school_address') ?>

    <?= $form->field($model, 'school_phone') ?>

    <?php // echo $form->field($model, 'school_alt_phone') ?>

    <?php // echo $form->field($model, 'cut_off_attendence') ?>

    <?php // echo $form->field($model, 'reg_no_prefix') ?>

    <?php // echo $form->field($model, 'admission_no_prefix') ?>

    <?php // echo $form->field($model, 'receipt_prefix') ?>

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
