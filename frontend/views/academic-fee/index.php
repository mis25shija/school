<?php

use app\models\AcademicFee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ClassInfo;
use app\models\AcademicSession;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\AcademicFeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$class= ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');
$session= ArrayHelper::map(AcademicSession::find()->all(), 'id', 'session_name');
?>
<div class="academic-fee-index">

    <div class="row">
        <div class="col-lg-5">
          <div class="card">
              <div class="card-header">
                <h5 class="text-olive"><i class="fa fa-rupee-sign"></i> Academic Fee</h5>   
              </div>
              <div class="card-body">

                <div class="academic-fee-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'class_info_id')->dropdownList($class,['prompt' => 'Select Class'])->label('Class') ?>    
                        </div>
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'session_id')->dropdownList($session,['prompt' => 'Select Session'])->label('Session') ?>  
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <?= $form->field($model, 'academic_fee_name')->textInput(['maxlength' => true]) ?>   
                      </div>  
                      <div class="col-md-4">
                        <?= $form->field($model, 'academic_fee_amount')->textInput(['maxlength' => true]) ?>    
                      </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-8">  
                            <?=  $form->field($model, 'fee_last_date')->widget(
                                            DatePicker::classname(), [
                                            
                                            
                                            'options' => ['placeholder' => 'Enter date ...'],
                                            
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'format' => 'yyyy-mm-dd',
                                            ]
                                        ])->label('Last Date'); ?> 
                        </div>
                        <div class="col-md-4">
                          <?= $form->field($model, 'fine_amount')->textInput(['maxlength' => true]) ?>  
                        </div>

                    </div>

                    <div class="form-group ">
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
                            
                            [
                                'attribute' => 'academic_fee_name',
                                'value' =>function($model){

                                    return "<p class = 'badge badge-warning' style = 'font-size:13px'>".$model->academic_fee_name."</p><p>"."<b> Amount : </b> Rs ".$model->academic_fee_amount."<br>"."<b>Last Date : </b>".date('d-m-Y',strtotime($model->fee_last_date))."<br>"."<b>Fine : </b> Rs ".$model->fine_amount."</p>";
                                },
                                'format' => 'raw',
                            ],
                            
                            
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
