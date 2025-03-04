<?php

use app\models\ClassInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\time\TimePicker;

$class= ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');

/** @var yii\web\View $this */
/** @var app\models\ClassInfoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

date_default_timezone_set('Asia/Kolkata'); // Set timezone to IST
?>
<div class="class-info-index">

    <div class="row"> <!-- 1st row start -->

        <div class="col-md-6">
            <div class="card" style="height: 600px">
                <div class="card-header">
                  <h5 class="text-olive"><i class="fa fa-list-ol"></i> Class Info</h5>  
                </div>
                <div class="card-body table-responsive">

                    <div class="class-info-form ">

                        <?php $form = ActiveForm::begin(['id'=>'class']); ?>

                        <div class="row">
                            <div class="col-sm-5">
                               <?= $form->field($model, 'class_name')->textInput(['maxlength' => true,'placeholder'=>'Class Name'])->label(false) ?> 
                            </div>
                            <div class="col-sm-5">
                               <?= $form->field($model, 'class_code')->textInput(['maxlength' => true,'placeholder'=>'Class Code'])->label(false) ?> 
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <?= Html::submitButton('Add', ['class' => 'btn  btn-success']) ?>
                                </div> 
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                    <hr style="border-top: solid 1px #63e685">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:14px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'class_name',
                            'class_code',
                            // 'created_by',
                            // 'created_date',
                            //'updated_by',
                            //'updated_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, ClassInfo $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card" style="height: 600px">
                <div class="card-header">
                   <h5 class="text-olive"><i class="fa fa-bars"></i> Sections</h5> 
                </div>
                <div class="card-body table-responsive">

                    <div class="section-form">

                        <?php $form = ActiveForm::begin(['id'=>'sec']); ?>

                        <div class="row">
                            <div class="col-sm-5">
                                 
                                <?= $form->field($modelsec, 'class_info_id')->dropdownList($class,['prompt' => 'Select Class'])->label(false) ?>   
                            </div>
                            <div class="col-sm-5">
                                <?= $form->field($modelsec, 'section_name')->textInput(['maxlength' => true,'placeholder'=>'Section Name'])->label(false) ?>   
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                                </div> 
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                    <hr style="border-top: solid 1px #63e685">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderSec,
                        'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:14px'],
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            
                            [
                                'attribute' => 'class_info_id',
                                'label' => 'Class',
                                'value' =>function($model) use($class){

                                    return isset($model->class_info_id) ? $class[$model->class_info_id] : '';

                                },
                            ],
                            'section_name',
                            // 'created_by',
                            // 'created_date',
                            //'updated_by',
                            //'updated_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, Section $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>
                      
                </div>
            </div>
            
        </div>
        
    </div> <!-- 1st row end -->

    <div class="row"> <!-- 2nd row start -->
        <div class="col-lg-6">
           <div class="card" style="height: 850px">
               <div class="card-header">
                  <h5 class="text-olive"><i class="far fa-clock"></i> Class Timing</h5> 
               </div>
               <div class="card-body table-responsive">

                <div class="class-timing-form">

                    <?php $form = ActiveForm::begin(['id'=>'time']); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($modeltime, 'class_timing_name')->textInput(['maxlength' => true])->label('Class Name') ?>   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($modeltime, 'start_time')->widget(TimePicker::classname(), []); ?>  
                        </div>
                        <div class="col-md-6"> 
                            <?= $form->field($modeltime, 'end_time')->widget(TimePicker::classname(), []); ?>  
                        </div>  
                    </div>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Add', ['class' => 'btn btn-block btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <hr style="border-top: solid 1px #63e685">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderTime,
                        // 'filterModel' => $searchModelTime,
                        'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:14px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            
                            [
                                'attribute'=>'class_timing_name',
                                'label' => 'Class Name',
                            ],
                            'start_time',
                            'end_time',
                            // 'created_by',
                            //'created_date',
                            //'updated_by',
                            //'updated_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, ClassTiming $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>   
               </div>
           </div> 
        </div>
        <div class="col-lg-6">

            <div class="card" style="height: 850px;">
                <div class="card-header">
                    <h5 class="text-olive"><i class="fa fa-calendar-alt"></i> Academic Holidays</h5>  
                </div>
                <div class="card-body table-responsive">

                    <div class="school-holiday-form">

                        <?php $form = ActiveForm::begin(['id'=>'holiday']); ?>

                        <div class="row">
                            <div class="col-md-6">
                             <?= $form->field($modelholiday, 'title')->textInput(['maxlength' => true]) ?>   
                            </div>
                            <div class="col-md-6">
                              <?= $form->field($modelholiday, 'description')->textarea(['rows' => 2]) ?>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <?= $form->field($modelholiday, 'start_date')->textInput() ?>     
                            </div>
                            <div class="col-md-5">
                                <?= $form->field($modelholiday, 'end_date')->textInput() ?>  
                            </div>
                            <div class="col-md-2" style="padding-top:30px">
                                <div class="form-group text-center">
                                    <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                        </div>

                        

                        <?php ActiveForm::end(); ?>

                    </div>
                    <hr style="border-top: solid 1px #63e685">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderHoliday,
                        // 'filterModel' => $searchModelHoliday,
                        'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:14px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'title',
                            'description:ntext',
                            'start_date',
                            'end_date',
                            //'created_by',
                            //'created_date',
                            //'updated_by',
                            //'updated_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, SchoolHoliday $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>
                    
                </div>
            </div>
            
        </div>
    </div> <!-- 2nd row end -->

    <div class="row"> <!-- 3rd row start -->
       
       <div class="col-lg-12">

        <div class="card" style="height: 1000px">
            <div class="card-header">
              <h5 class="text-olive"><i class="fa fa-book"></i> Subjects</h5>  
            </div>
            <div class="card-body table-responsive">
                
                        <div class="subject-form">

                            <?php $form = ActiveForm::begin(['id'=>'sub']); ?>

                            <div class="row">
                                <div class="col-sm-6">

                                   <?= $form->field($modelsub, 'class_info_id')->dropdownList($class,['prompt' => 'Select Class'])->label('Class') ?>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelsub, 'subject_name')->textInput(['maxlength' => true]) ?>   
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelsub, 'sub_code')->textInput(['maxlength' => true]) ?>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                   <?= $form->field($modelsub, 'subject_type')->dropDownList([ 'THEORY' => 'THEORY', 'PRACTICAL' => 'PRACTICAL', ], ['prompt' => 'Select Subject-Type']) ?> 
                                </div>
                                <div class="col-sm-6">
                                   <?= $form->field($modelsub, 'optional')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => 'Whether Optional']) ?> 
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>  

                        <?= GridView::widget([
                            'dataProvider' => $dataProviderSub,
                            'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:14px'],
                            // 'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'id',
                                'subject_name',
                                'sub_code',
                                'subject_type',
                                
                                [
                                    'attribute' => 'class_info_id',
                                    'label' => 'Class',
                                    'value' =>function($model) use($class){

                                        return isset($model->class_info_id) ? $class[$model->class_info_id] : '';

                                    },
                                ],

                                
                                [
                                    'attribute' => 'optional',
                                    'value' => function($model){

                                        if ($model->optional == 'YES') {
                                            
                                            return "<p class = 'badge badge-success' style = 'font-size:14px'>".$model->optional."</p>";
                                        }else{

                                            return "<p class = 'badge badge-danger' style = 'font-size:14px'>".$model->optional."</p>";
                                        }
                                    },

                                    'format' => 'raw',
                                ],
                              
                    
                            ],
                        ]); ?> 
                    
                    </div>
                </div>
            </div>
           
        </div> <!-- 3rd row end -->


</div>

<style type="text/css">
    
    .control-label{

        color: gray;
        font-size: 13px;
    }

    .help-block{

        color: red;
        font-size: 12px;
    }

    th>a{

        color: #548009;
    }
    th{
        white-space: nowrap;
        background: #dbfca2;
    }
    .summary{

        font-size: 13px;
    }

</style>
