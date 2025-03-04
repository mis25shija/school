<?php

use app\models\StudentAdmParticular;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\ClassInfo;
use app\models\StudentCategory;
use app\models\GeneralCategory;
use app\models\StudentInfo;
use app\models\AcademicSession;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\StudentAdmParticularSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$class= ArrayHelper::map(ClassInfo::find()->where(['record_status'=>'1'])->all(), 'id', 'class_name');
$scat= ArrayHelper::map(StudentCategory::find()->where(['record_status'=>'1'])->all(), 'id', 's_cat_name');
$gcat= ArrayHelper::map(GeneralCategory::find()->where(['record_status'=>'1'])->all(), 'id', 'g_cat_name');
$session= ArrayHelper::map(AcademicSession::find()->where(['active_status'=>'1'])->all(), 'id', 'session_name');
$sib = StudentInfo::find()->asArray()->select('stud_name')->where(['sibling_id'=>$id])->all();

$details = StudentInfo::find()->where(['id'=>$id])->one();

$ses = AcademicSession::find()->where(['active_status'=>'1'])->one();

?>
<div class="student-adm-particular-index">

<?php 

  if(isset($dataProvider)) {

?>

    <div class="card">
        <div class="card-header" style="font-size: 14px;">

            <div class="card">
                <div class="card-header bg-olive text-center" style="padding: 7px 0px 0px 0px;">
                   <h4>STUDENT ADMISSION INFORMATION</h4> 
                </div>
            </div>

            <div class="row" >
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Student Name : </b> <?= $details->stud_name;  ?></p>
               </div>
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Class : </b> <?= $class[$details->course_id];  ?></p> 
               </div>
               
           </div> 
           <div class="row" >
               
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Student Category : </b> <?= $scat[$details->student_category_id];  ?></p> 
               </div>
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Social Category : </b> <?= $gcat[$details->general_category_id];  ?></p> 
               </div>
           </div> 
           <div class="row" >
               
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Parent Contact No : </b> <?= $details->parent_phone;  ?></p> 
               </div>
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Alternative Contact No : </b> <?= $details->parent_alt_phone;  ?></p> 
               </div>
           </div> 
           <div class="row">
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Permanent Address : </b> <?= $details->permanent_address;  ?></p>
               </div>
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Present Address : </b> <?= $details->present_address;  ?></p> 
               </div>
           </div>  
            
        </div>
        <div class="card-body" style="padding: 5px 60px 5px 60px">
            <br><br>
            <div class="card">
                <div class="card-header bg-olive text-center" style="padding: 7px 0px 0px 0px;">
                    <h5>BILLING INFORMATION (<?= $ses->session_name ?>)</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                   <h5>Admission Payment Info</h5> 
                   <div class="table-responsive">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider1,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table','style'=>'font-size:13px'],
                        'columns' => [
                            // ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            
                            [
                                'attribute' => 'payment_date',
                                'label' => 'Date',
                                'value' => function($model){

                                    return date('d-m-Y',strtotime($model->payment_date));
                                },
                            ],
                            'total_fee',
                            'discount',
                            'fine',
                            'payable_amount',
                            'amount_received',
                            'due_amount',

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-print"></span> Print', ['student-adm-particular/admprint', 'id' => $model->student_id], ['class' => ' btn btn-warning btn-xs',]);  
                                          },
                                          'format' => 'raw',
                            ],
                        ],
                    ]); ?>
                       
                   </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5>Particulars Payment Info</h5> 
                    <?= Html::beginForm(['student-adm-particular/parprint'],'post');?>
                    <div>
                        <p>
                            <?= Html::submitButton("<span class = 'fa fa-print'></span> Print", ['class' => 'btn btn-success','value'=>'print','name'=>'submit']) ?>
                        </p>
                        <p style="color: red;font-size: 14px">* Tick the CheckBox Below To select.</p>
                    </div>
                    <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['class' => 'yii\grid\CheckboxColumn'],
                            // 'id',
                            // 'student_id',
                            [
                                'attribute' => 'created_date',
                                'label' => 'Date',
                                'value' => function($model){

                                    return date('d-m-Y',strtotime($model->created_date));
                                },
                            ],
                            'particular_name',
                            'price',
                            'due_amount',

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-pen"></span>', ['student-adm-particular/update', 'id' => $model->id], ['class' => ' popup btn btn-warning btn-xs',]);  
                                          },
                                          'format' => 'raw',
                            ],

                            [
                              'value' => function ($model) {
                                return Html::a('<span class="fa fa-trash"></span>', ['student-adm-particular/delete', 'id' => $model->id], ['class' => ' btn btn-danger btn-xs',]);  
                                          },
                                          'format' => 'raw',
                            ],
                            //'created_by',
                            //'created_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, StudentAdmParticular $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>

                    </div>
                  <?= Html::endForm() ?> 
                    
                </div>
            </div>
              
        </div>
    </div>

    <?php } ?>
</div>

<style type="text/css">

    .table th{
        white-space: nowrap;
        background: #dbfca2;
    }

    th>a{

        color: #548009;
    }
    
    .form-control{

        padding: 5px;
        height: 30px;
        font-size: 14px;
    }

    .summary{

        display: none;
    }

    .control-label{

        color: gray;
        font-size: 13px;
    }
    .help-block{

        color: red;
        font-size: 13px;
    }
    .modal-header{

        background: #01ff70;
    }
</style>

<?php

        Modal::begin([

                  'title' => '<h4 class = "text-success">Update Particulars</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-lg',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>

<?php
$this->registerJS('



   $(".popup").click(function(e) {
     e.preventDefault();
     $("#jobPop").modal("show").find(".modal-body")
     .load($(this).attr("href"));
   });



');


?>
