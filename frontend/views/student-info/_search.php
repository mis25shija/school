<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ClassInfo;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\StudentInfoSearch $model */
/** @var yii\widgets\ActiveForm $form */
$class= ArrayHelper::map(ClassInfo::find()->where(['record_status'=>'1'])->all(), 'id', 'class_name');
?>

<div class="student-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['check'],
        'method' => 'get',
    ]); ?>

    <div class="card">
        <div class="card-header bg-lime" style="padding: 5px 10px 2px 10px">
            <h5 class="text-success"><i class="fa fa-search"></i> Search Student</h5>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-4">
                   <?= $form->field($model, 'class')->dropDownList($class, ['prompt' => 'Select Class......'])->label(false) ?>
                </div>
                <div class="col-md-1 text-center">
                    <p>or</p>
                </div>

                <div class="col-md-4">
                   <?php echo $form->field($model, 'name')->textInput(['placeholder' => 'Enter Student Name........'])->label(false) ?> 
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?= Html::submitButton('Search', ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= Html::a('Reset', ['student-info/check'], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style type="text/css">
    
    .form-control{

        padding: 5px;
        height: 30px;
        font-size: 14px;
    }
</style>
