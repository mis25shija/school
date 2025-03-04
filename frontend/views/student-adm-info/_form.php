<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\ClassInfo;
use app\models\StudentCategory;
use app\models\GeneralCategory;
use app\models\StudentInfo;
use app\models\AcademicSession;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var app\models\StudentAdmInfo $model */
/** @var yii\widgets\ActiveForm $form */
$class= ArrayHelper::map(ClassInfo::find()->where(['record_status'=>'1'])->all(), 'id', 'class_name');
$scat= ArrayHelper::map(StudentCategory::find()->where(['record_status'=>'1'])->all(), 'id', 's_cat_name');
$gcat= ArrayHelper::map(GeneralCategory::find()->where(['record_status'=>'1'])->all(), 'id', 'g_cat_name');
$session= ArrayHelper::map(AcademicSession::find()->where(['active_status'=>'1'])->all(), 'id', 'session_name');
$sib = StudentInfo::find()->asArray()->select('stud_name')->where(['sibling_id'=>$id])->all();
?>

<div class="student-adm-info-form">
    <div>
        <?= Html::a("<span class = 'fa fa-backward'></span> Back", ['student-info/check'], ['class' => 'btn btn-sm btn-danger']) ?>     
    </div>
    <br>

    <div class="card card-outline card-olive">
        <div class="card-body" style="font-size: 13px;">
           <div class="row" >
               <div class="col-lg-4">
                    <p style="color: gray;"><b>Student Name : </b> <?= $details->stud_name;  ?></p>
               </div>
               <div class="col-lg-2">
                    <p style="color: gray;"><b>Class : </b> <?= $class[$details->course_id];  ?></p> 
               </div>
               <div class="col-lg-3">
                    <p style="color: gray;"><b>Student Category : </b> <?= $scat[$details->student_category_id];  ?></p> 
               </div>
               <div class="col-lg-3">
                    <p style="color: gray;"><b>Social Category : </b> <?= $gcat[$details->general_category_id];  ?></p> 
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

           <div class="row">
                <div class="col-lg-3">
                    <p style="color: gray;"><b>Student Type : </b> <?= $details->stud_type ?></p>
               </div>
               <div class="col-lg-3">
                    <p style="color: gray;"><b>Whether Siblings : </b> <?php 
                        if ($sib) {
                        echo "YES";
                    }else{

                        echo 'NO';
                    }
                          
                    ?></p>
               </div>
               <div class="col-lg-6">
                    <p style="color: gray;"><b>Sibling Details : </b>
                        <?php 
                        $det = [];
                        if ($sib) {

                            foreach ($sib as $key => $value) {
                                
                                $det[]=$value['stud_name'];
                            }
                            

                            echo implode(', ', $det);
                    }else{

                        echo 'NA';
                    }
                          
                    ?>
                </p> 
               </div>
           </div> 
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-header" style="padding: 4px" >
            <p  style="font-size: 20px"  class="text-olive"><i class="fa fa-plus "></i> Admission Payment </p>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-lg-4">
              <?= $form->field($model, 'session_id')->dropdownlist($session,['prompt' => 'Select Session.....']) ?>
            </div>
          </div>

            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'payment_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Select  Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd',   
                        ]
                    ])->label('Payment Date');?>  
                </div>
                <?php if ($update) { ?>
                

              <?php }else{ ?>
                      <div class="col-lg-4">
                        <?= $form->field($model, 's_type')->dropdownlist(['OLD-STUDENT'=>'OLD-STUDENT','NEW-STUDENT'=>'NEW-STUDENT'],['prompt' => 'Select Student-Type.....'])->label('Student Type') ?>   
                    </div>
              <?php } ?>
                <div class="col-lg-4">
                    <?= $form->field($model, 'class_id')->dropdownlist($class,['prompt' => 'Select Class.....']) ?>   
                </div>
               
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'total_fee')->textInput(['readonly' => true])->label('Fee Amount (Rs)') ?>   
                </div>
                
                <div class="col-lg-4">
                    <?= $form->field($model, 'fine')->textInput(['readonly' => true])->label('Fine (Rs)') ?>
                </div>

                <div class="col-lg-4">
                    <?= $form->field($model, 'payable_amount')->textInput(['readonly' => true])->label('Payable Amount (Rs)') ?> 
                </div>
            </div>
            <div class="row">
                
                
                <div class="col-lg-4">
                    <?= $form->field($model, 'discount')->textInput(['maxlength' => true])->label('Discount (Rs)') ?>  
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'amount_received')->textInput(['maxlength' => true])->label('Amount Received (Rs)') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'due_amount')->textInput(['readonly' => true])->label('Due Amount (Rs)') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p style="font-size: 16px"> Add Particulars : <span ><?= Html::a("<span class = 'fa fa-plus'></span> Add", ['student-adm-particular/create'], ['class' => ' popup btn btn-sm btn-warning']) ?></span></p>
                </div>
            </div>
            <div class="row">
                
                
                <div class="col-lg-4">
                    <?= $form->field($model, 'payment_type')->dropdownlist(['CASH'=>'CASH','UPI'=>'UPI','CASH+UPI'=>'CASH+UPI','BANK TRANSFER'=>'BANK TRANSFER','CHEQUE'=>'CHEQUE','NONE'=>'NONE'],['prompt' => 'Select Payment-Type.....']) ?>  
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'payment_status')->dropdownlist(['PAID'=>'PAID','DUE'=>'DUE','UNPAID'=>'UNPAID','FREE'=>'FREE'],['prompt' => 'Select Payment-Status.....']) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-4">
                    
                </div>
                <div class="form-group text-center col-lg-4">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-block btn-success']) ?>
                </div>
                <div class="col-lg-4">
                    
                </div>
            </div>
            
            
        </div>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>


<?php

        Modal::begin([

                  'title' => '<h4 class = "text-secondary">Add Particulars</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-lg',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>


<style type="text/css">
    
    .form-control{

        padding: 5px;
        height: 30px;
        font-size: 14px;
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

$amt = Url::to(["amount"]);

$this->registerJS('

   $(".popup").click(function(e) {
     e.preventDefault();
     $("#jobPop").modal("show").find(".modal-body")
     .load($(this).attr("href"));
   });


   $("#studentadminfo-s_type").change(function() {  
        calculate();
    });

    $("#studentadminfo-class_id").change(function() {  
        calculate();
    });

    $("#studentadminfo-payment_date").change(function() {  
        calculate();
    });

    $("#studentadminfo-session_id").change(function() {  
        calculate();
    });

    

    var calculate = function () {
      var input1 = $("#studentadminfo-s_type").val();
      var input2 = $("#studentadminfo-class_id").val();
      var input3 = $("#studentadminfo-payment_date").val();
      var input4 = $("#studentadminfo-session_id").val();
      
      var url = "'.$amt.'";
     
      $.post(url+"&stype="+input1+"&class="+input2+"&date="+input3+"&session="+input4, function(data) {
                if(!data)
                {
                  alert("Progrfam not found !!");
                } 
                else{
                    var value = $.parseJSON(data); 
                    // console.log(value);
                    $("#studentadminfo-total_fee").val(value.fee); 
                    $("#studentadminfo-payable_amount").val(value.tfee);
                    $("#studentadminfo-fine").val(value.fine);
                  
                }
            });
        
    };


    $("#studentadminfo-discount").change(function() {  
        updateTotal();
    });


    var updateTotal = function () {
      var input1 = parseInt($("#studentadminfo-discount").val());
      var input2 = parseInt($("#studentadminfo-total_fee").val());
     
      if(input1==""){
        input1 = 0;
      }else{
        input1=parseInt($("#studentadminfo-discount").val());
      }

      if(input2==""){
        input2 = 0;
      }else{
        input2=parseInt($("#studentadminfo-total_fee").val());
      }

      $("#studentadminfo-payable_amount").val(input2-input1);
         
    };




    $("#studentadminfo-amount_received").change(function() {  
        due();
    });


    var due = function () {
      var input1 = parseInt($("#studentadminfo-amount_received").val());
      var input2 = parseInt($("#studentadminfo-payable_amount").val());
     
      if(input1==""){
        input1 = 0;
      }else{
        input1=parseInt($("#studentadminfo-amount_received").val());
      }

      if(input2==""){
        input2 = 0;
      }else{
        input2=parseInt($("#studentadminfo-payable_amount").val());
      }


      $("#studentadminfo-due_amount").val(input2-input1);
         
    };



');


?>
