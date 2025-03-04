<?php

use app\models\SchoolDetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\ClassInfo;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\SchoolDetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'School Details';
// $this->params['breadcrumbs'][] = $this->title;
$class= ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');

?>
<div class="school-detail-index">

    <div class="row"> <!-- 1st row start -->
        <div class="col-lg-7">

            <div class="card" style="height: 800px">
                <div class="card-header">
                   <h5 class="text-olive"><i class="fa fa-school"></i> School Info</h5> 
                </div>
                <div class="card-body table-responsive">
                   <div class="school-detail-form">

                        <?php $form = ActiveForm::begin(['id'=>'details','options'=>['enctype' => 'multipart/form-data']]); ?>

                        <div class="row">

                                <div class="col-md-6">

                                    <?= $form->field($model, 'simg')->fileInput()->label('Upload Logo')?>

                                </div>
                                <div class="col-md-6">
                                    <?php $url = (isset($model->school_photo))?"docs/logo/".$model->school_photo: "docs/upload.png"?>
                                        <img id="picture" class="mx-auto d-block" src=<?=$url ?>  style ="width: 40%;"> 
                                </div>

                       
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'school_name')->textInput(['maxlength' => true,'placeholder'=>'School Name']) ?>   
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                              <?= $form->field($model, 'school_phone')->textInput(['maxlength' => true,'placeholder'=>'Phone Number']) ?>   
                            </div>
                            <div class="col-md-6">
                              <?= $form->field($model, 'school_alt_phone')->textInput(['maxlength' => true,'placeholder'=>'Alternative Phone Number']) ?>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'school_address')->textarea(['rows' => 4,'placeholder'=>'Address .....']) ?>  
                            </div>

                        </div>

                        
                        <div class="row">
                           <div class="col-md-6">
                              <?= $form->field($model, 'cut_off_attendence')->textInput(['maxlength' => true,'placeholder'=>'Cut Off Attendance']) ?> 
                              <?= $form->field($model, 'reg_no_prefix')->textInput(['maxlength' => true,'placeholder'=>'Registration No. Prefix']) ?>
                           </div> 
                           <div class="col-md-6">
                               <?= $form->field($model, 'admission_no_prefix')->textInput(['maxlength' => true,'placeholder'=>'Admission No. Prefix']) ?>
                               <?= $form->field($model, 'receipt_prefix')->textInput(['maxlength' => true,'placeholder'=>'Receipt Prefix']) ?>
                           </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-block btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div> 
                </div>
            </div>
            
        </div>
        <div class="col-lg-5">
            <div class="card" style="height: 800px">
                <div class="card-header">
                    <h5 class="text-olive"><i class="fa fa-clock"></i> Academic Session</h5> 
                </div>
                <div class="card-body table-responsive">

                    <div class="academic-session-form">

                        <?php $form = ActiveForm::begin(['id'=>'session']); ?>

                        <div class="row">
                           <div class="col-md-12">
                                <?= $form->field($modelsession, 'session_name')->textInput(['maxlength' => true,'placeholder'=>'Session Name'])->label(false) ?>  
                           </div> 
                           
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            
                                <?= $form->field($modelsession, 'session_start_date')->widget(DatePicker::classname(), [
                                    'options' => ['placeholder' => 'Start-Date .....'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'todayHighlight' => true,
                                        'format' => 'yyyy-mm-dd',   
                                    ]
                                ])->label(false);?>
                            </div>    
                            <div class="col-md-6">
                                <?= $form->field($modelsession, 'session_end_date')->widget(DatePicker::classname(), [
                                    'options' => ['placeholder' => 'End-Date .....'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'todayHighlight' => true,
                                        'format' => 'yyyy-mm-dd',   
                                    ]
                                ])->label(false);?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-block btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                    <!-- <div> -->
                       <?= GridView::widget([
                            'dataProvider' => $dataProviderSession,
                            // 'filterModel' => $searchModel,
                            'tableOptions' => ['class'=>'table','style'=>'font-size:14px;color:#4f5c0a'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'id',
                                
                                [
                                    'attribute' => 'session_name',
                                    'label' => 'Session',
                                    'value' => function($model){

                                        return "<div style = 'background:#c9ff73;border-radius:15px'><p class = 'badge badge-warning' style = 'font-size:14px'><b>".$model->session_name."</b></p><p style = 'text-align:center'>"."<b>Start Date : </b>".date('d-m-Y',strtotime($model->session_start_date))."</p><p style = 'text-align:center;padding-bottom:10px'>"."<b>End Date : </b>".date('d-m-Y',strtotime($model->session_end_date))."</p></div>";
                                    },
                                    'format'=>'raw',
                                ],
                                
                                // 'session_start_date',
                                // 'session_end_date',
                                //'created_by',
                                //'created_date',
                                //'updated_by',
                                //'updated_date',
                                //'record_status',
                                // [
                                //     'class' => ActionColumn::className(),
                                //     'urlCreator' => function ($action, AcademicSession $model, $key, $index, $column) {
                                //         return Url::toRoute([$action, 'id' => $model->id]);
                                //      }
                                // ],
                            ],
                            ]); ?> 
                    <!-- </div> -->
                     
                </div>
            </div>
        </div>
    </div> <!-- 1st row end-->
       
</div>

</div>


<?php
$this->registerJS('

    $(document).on("change","#schooldetail-simg",function(){
      
            var image = document.getElementById("picture");
            image.src = URL.createObjectURL(event.target.files[0]);

    });

');
?>

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

        color: gray;
    }
    th{
        white-space: nowrap;
    }
    .summary{

        font-size: 13px;
    }

</style>
