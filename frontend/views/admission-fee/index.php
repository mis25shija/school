<?php

use app\models\AdmissionFee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\ClassInfo;
use app\models\AcademicSession;
/** @var yii\web\View $this */
/** @var app\models\AdmissionFeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Admission Fees';
// $this->params['breadcrumbs'][] = $this->title;
$class= ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');
$session= ArrayHelper::map(AcademicSession::find()->all(), 'id', 'session_name');
?>
<div class="admission-fee-index">

    <div class="row">
        <div class="col-lg-5">
            <div class="card" >
                <div class="card-header">
                  <h5 class="text-olive"><i class="fa fa-rupee-sign"></i> Admission Fee</h5>  
                </div>
                <div class="card-body table-responsive">

                            <div class="admission-fee-form">

                                <?php $form = ActiveForm::begin(); ?>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <?= $form->field($model, 'class_info_id')->dropdownList($class,['prompt' => 'Select Class'])->label('Class') ?>   
                                    </div>
                                    <div class="col-sm-6">
                                         
                                        <?= $form->field($model, 'session_id')->dropdownList($session,['prompt' => 'Select Session'])->label('Session') ?>  

                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?= $form->field($model, 'new_student_adm_fee')->textInput(['maxlength' => true])->label('New Student Admission Fee (Rs)') ?>   
                                    </div>
                                    <div class="col-sm-6">
                                         <?= $form->field($model, 'old_student_adm_fee')->textInput(['maxlength' => true])->label('Old Student Admission Fee (Rs)') ?> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8">

                                       <?=  $form->field($model, 'adm_last_date')->widget(
                                            DatePicker::classname(), [
                                            
                                            
                                            'options' => ['placeholder' => 'Enter date ...'],
                                            
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'format' => 'yyyy-mm-dd',
                                            ]
                                        ])->label('Last Date'); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'fine_amount')->textInput(['maxlength' => true]) ?>  
                                    </div> 
                                </div>
                                
                                <br>
                                <div class="form-group">
                                    <?= Html::submitButton('Add', ['class' => 'btn btn-block btn-success']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                            
                        </div>  
                </div>
            </div>
        

        <div class="col-lg-7">
          <div class="card">
              <div class="card-body table-responsive">

                <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    // 'id',
                                    // 'class_info_id',
                                    [
                                        'attribute' => 'class_info_id',
                                        'label' => 'Class',
                                        'value' =>function($model) use($class){

                                            return isset($model->class_info_id) ? $class[$model->class_info_id] : '';

                                        },
                                        'filter' => $class,
                                    ],
                                    
                                    [
                                        'attribute' => 'session_id',
                                        'label' => 'Session',
                                        'value' =>function($model) use($session){

                                            return isset($model->session_id) ? $session[$model->session_id] : '';

                                        },
                                        'filter' => $session,
                                    ],
                                    [
                                        'attribute' => 'new_student_adm_fee',
                                        'label' => 'Admission Fee',
                                        'value' => function($model){

                                            return "<p>"."<b>New Student : </b> Rs ".$model->new_student_adm_fee."</p><p>"."<b>Old Student : </b> Rs ".$model->old_student_adm_fee."</p><p class = 'text-danger'>"."<b>Last Date : </b> ".date('d-m-Y',strtotime($model->adm_last_date))."</p><p>"."<b> Fine Amount : </b> Rs ".$model->fine_amount."</p>";

                                        },
                                        'format' => 'raw',
                                        'filter' => '',
                                    ],
                                    
                                    
                                ],
                            ]); ?>
                  
              </div>
          </div>  
        </div>
    </div>
</div>
<style type="text/css">
    .control-label{

        color: gray;
        font-size: 12px;
    }

    th>a{

        color: gray;
    }

    th{
        white-space: nowrap;
    }

    .help-block{

        color: red;
        font-size: 12px;
    }
    
</style>
