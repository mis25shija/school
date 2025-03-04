<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcademicSession;
use kartik\date\DatePicker;
use app\models\ClassInfo;
use app\models\Religion;
use app\models\StudentCategory;
use app\models\GeneralCategory;
use app\models\District;
use app\models\State;
use wbraganca\dynamicform\DynamicFormWidget;
/** @var yii\web\View $this */
/** @var app\models\StudentInfo $model */
/** @var yii\widgets\ActiveForm $form */
$session= ArrayHelper::map(AcademicSession::find()->where(['active_status'=>'1'])->all(), 'id', 'session_name');
$class= ArrayHelper::map(ClassInfo::find()->where(['record_status'=>'1'])->all(), 'id', 'class_name');
$religion= ArrayHelper::map(Religion::find()->where(['record_status'=>'1'])->all(), 'id', 'religion_name');
$scat= ArrayHelper::map(StudentCategory::find()->where(['record_status'=>'1'])->all(), 'id', 's_cat_name');
$gcat= ArrayHelper::map(GeneralCategory::find()->where(['record_status'=>'1'])->all(), 'id', 'g_cat_name');
$dis= ArrayHelper::map(District::find()->where(['record_status'=>'1'])->all(), 'id', 'district_name');
$state= ArrayHelper::map(State::find()->where(['record_status'=>'1'])->all(), 'id', 'state_name');
?>

<div class="student-info-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="card">
        <div class="card-header">
         <h5 class="text-olive"><i class="fa fa-plus"></i> Student Entry</h5>   
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'session_id')->dropDownList($session, ['prompt' => 'Select Academic Session......'])->label('Session <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div> 

                <div class="col-lg-4">
                    <?= $form->field($model, 'adm_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Select  Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd',   
                        ]
                    ])->label('Admission Date <span style="color: red;">*</span>', ['encode' => false]);?>  
                </div>
                 
                <div class="col-lg-4">
                    <?= $form->field($model, 'course_id')->dropDownList($class, ['prompt' => 'Select Class......'])->label('Class <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div>
                           
            </div>
            <p style="font-size: 16px;color: #579476"><b>Student Particulars</b></p>
            <!-- <hr style="background: #579476"> -->
            <div style="padding: 10px;border-radius: 7px;background:#f2fcf6 ">
           
            <br>
            <div class="row">
                
                <div class="col-lg-3">
                    <?= $form->field($model, 'stud_name')->textInput(['maxlength' => true])->label('Student Name <span style="color: red;">*</span>', ['encode' => false]) ?>   
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other', ], ['prompt' => ''])->label('Gender <span style="color: red;">*</span>', ['encode' => false]) ?> 
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'stud_dob')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Select  Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd',   
                        ]
                    ])->label('Date of birth <span style="color: red;">*</span>', ['encode' => false]);?>  
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'blood_group')->dropDownList([ 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-', ], ['prompt' => '']) ?> 
                </div>
                
            </div>

            <div class="row">
                
                <div class="col-lg-3">
                    <?= $form->field($model, 'stud_email')->textInput(['maxlength' => true]) ?>  
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'stud_aadhaar_no')->textInput(['maxlength' => true])->label('Student Aadhaar No <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'std_id_mark')->textInput(['maxlength' => true]) ?> 
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'mother_tongue')->textInput(['maxlength' => true]) ?> 
                </div>
                
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($model, 'religion_id')->dropDownList($religion, ['prompt' => 'Select Religion......'])->label('Religion <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'student_category_id')->dropDownList($scat, ['prompt' => 'Select Student Category......'])->label('Student Category <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'general_category_id')->dropDownList($gcat, ['prompt' => 'Select Social Category......'])->label('Social Category <span style="color: red;">*</span>', ['encode' => false]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
                </div>
                
            </div>

            </div>
            <br>
            <br>
            <p  style="font-size:16px;color: #579476;font-weight: bold;">Parent's Particulars</p> 
            <div style="background: #f2fcf6;padding: 10px;border-radius: 7px">
            <div class="row">

                <div class="col-lg-3">
                    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true])->label('Father Name <span style="color: red;">*</span>', ['encode' => false]) ?>  
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'father_occupation')->textInput(['maxlength' => true])->label('Father Occupation <span style="color: red;">*</span>', ['encode' => false]) ?> 
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'father_annual_income')->textInput(['maxlength' => true]) ?>  
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'parent_phone')->textInput(['maxlength' => true])->label('Parent Phone <span style="color: red;">*</span>', ['encode' => false]) ?>  
                </div>
             </div>       
            <div class="row ">

                    <div class="col-lg-3">
                        <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true])->label('Mother Name <span style="color: red;">*</span>', ['encode' => false]) ?>           
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'mother_occupation')->textInput(['maxlength' => true]) ?>          
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'mother_annual_income')->textInput(['maxlength' => true]) ?>         
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'parent_alt_phone')->textInput(['maxlength' => true]) ?>          
                    </div>
                
                    
            </div> 
               
            
        </div>
            <br>
            
                <p style="font-size:16px;color: #579476;font-weight: bold;">Present Address</p>
                <div style="background: #f2fcf6;padding: 10px;border-radius: 7px">
                    
                    <div class="row">
                        <div class="col-lg-4">
                           
                          <?= $form->field($model, 'present_district_id')->dropDownList($dis, ['prompt' => 'Select District......'])->label('Present District <span style="color: red;">*</span>', ['encode' => false]) ?>
                        </div>
                        <div class="col-lg-4">
                           
                          <?= $form->field($model, 'present_state_id')->dropDownList($state, ['prompt' => 'Select State......'])->label('Present State <span style="color: red;">*</span>', ['encode' => false]) ?>
                        </div>
                        <div class="col-lg-4">
                          <?= $form->field($model, 'present_pincode')->textInput(['maxlength' => true])->label('Present Pincode <span style="color: red;">*</span>', ['encode' => false]) ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                           <?= $form->field($model, 'present_address')->textarea(['rows' => 2])->label('Present Address <span style="color: red;">*</span>', ['encode' => false]) ?> 
                        </div>
                    </div>
                    
                </div>
                <br>
                <p style="font-size:16px;color: #579476;font-weight: bold;">Permanent Address</p>
                <div style="background: #f2fcf6;padding: 10px;border-radius: 7px">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-check">
                                <input type="hidden" name="User[agree_terms]" value="0">
                                <input type="checkbox" id="user-agree_terms" class="form-check-input" name="User[agree_terms]" value="1">
                                <label class="form-check-label text-info" for="user-agree_terms"><b>Same as Present Address</b></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">

                        <div class="col-lg-4">
                          <?= $form->field($model, 'permanent_district_id')->dropDownList($dis, ['prompt' => 'Select Religion......'])->label('Permanent District <span style="color: red;">*</span>', ['encode' => false]) ?>
                        </div>
                        <div class="col-lg-4">
                          <?= $form->field($model, 'permanent_state_id')->dropDownList($state, ['prompt' => 'Select State......'])->label('Permanent State <span style="color: red;">*</span>', ['encode' => false]) ?>
                        </div>
                        <div class="col-lg-4">
                          <?= $form->field($model, 'permanent_pincode')->textInput(['maxlength' => true])->label('Permanent Pincode <span style="color: red;">*</span>', ['encode' => false]) ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                           <?= $form->field($model, 'permanent_address')->textarea(['rows' => 2])->label('Permanent Address <span style="color: red;">*</span>', ['encode' => false]) ?>
                        </div>
                    </div>
                    
                </div>
            
            <div class="row">
                <br>
                <div class="col-lg-2">
                    <?= $form->field($model, 'have_sibling')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?> 
                    
                </div>    
            </div>
            <br>
            <div id="sibling-form" style="display: none;">
            <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelitem[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'classid',
                        'name',
                        'gen',
                        'dob',
                        'b_grp',
                        'email',
                        'aadhaar',
                        'i_mark',
                        'm_tongue',
                        'rel_id',
                        's_cat_id',
                        'g_cat_id',
                        'national',                        
                    ],
                ]); 
                 // echo "<pre>"; print_r($modelitem);die;
                ?>


            <div class="card">
        
                <div class="card-body">
                    <div class="container-items "><!-- widgetContainer -->
                        <div class="card-header bg-olive">
                            <h5>Add Siblings <span style="float:right"><button style="float: right" type="button" class="add-item btn btn-warning btn-sm"><i class="fa fa-plus"></i> ADD</button></span></h5>
                            
                                
                            
                        </div>
                        <br>
                        <div class="item">
                        <?php foreach ($modelitem as $i => $modelsitem): ?>

                            <?php
                            // "<pre>";echo print_r($modelsitem);die;
                            if (!$modelsitem->isNewRecord) {

                                echo Html::activeHiddenInput($modelsitem, "[{$i}]id");
                            }
                            ?>
                            <br>
                            <div style="border: dotted 1px #c9c8c7;border-radius: 5px;padding: 10px">
                            <div style="float: right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </div>
                            <br><br>
                            <div class="row">
                                
                                    <div class="col-md-3">
                                        <?= $form->field($modelsitem, "[{$i}]class")->dropDownList($class, ['prompt' => 'Select Class......'])->label('Class') ?>
                                    </div>    
                               
                            </div>
                            <div class="row">
                                        
                                
                                <div class="col-md-3">
                                    
                                    <?= $form->field($modelsitem, "[{$i}]name")->textInput(['maxlength' => true])->label('Student Name') ?> 
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem,"[{$i}]gen")->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other', ], ['prompt' => ''])->label('Gender') ?> 
                                </div>
                                <div class="col-md-3">
                                    

                                    <?= $form->field($modelsitem, "[{$i}]dob")->input('date') ?>
                                </div>
                                <div class="col-md-3">
                                   <?= $form->field($modelsitem, "[{$i}]b_grp")->dropDownList([ 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-', ], ['prompt' => ''])->label('Blood Group') ?>  
                                </div>   
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    
                                    <?= $form->field($modelsitem, "[{$i}]email")->textInput(['maxlength' => true])->label('Student Email') ?> 
                                </div>
                                        
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem, "[{$i}]aadhaar")->textInput(['maxlength' => true])->label('Student Aadhaar') ?> 
                                </div>
                                
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem,"[{$i}]i_mark")->textInput(['maxlength' => true])->label('Identification Mark') ?> 
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem, "[{$i}]m_tongue")->textInput(['maxlength' => true])->label('Mother Tongue') ?> 
                                </div>

                                <br>
                                        
                                    
                                    
                               
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    
                                    <?= $form->field($modelsitem, "[{$i}]rel_id")->dropDownList($religion, ['prompt' => 'Select Religion......'])->label('Religion') ?>
                                </div>
                                        
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem, "[{$i}]s_cat_id")->dropDownList($scat, ['prompt' => 'Select Student Category......'])->label('Student Category') ?> 
                                </div>
                                
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem,"[{$i}]g_cat_id")->dropDownList($gcat, ['prompt' => 'Select Social Category......'])->label('Social Category') ?> 
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($modelsitem, "[{$i}]national")->textInput(['maxlength' => true])->label('Nationality') ?> 
                                </div>

                                <br>
                                        
                                    
                                    
                               
                            </div>
                            </div><!-- .row -->


                        <?php endforeach; ?>
                        </div>  
                    </div>
                    <?php DynamicFormWidget::end();?>
                    </div>        
                </div>
            </div>
            <div class="form-group text-center">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>

            
        </div>
    </div>

   

    <?php ActiveForm::end(); ?>

</div>



<?php
$this->registerJs(<<<JS

    $(document).ready(function () {
       function reinitDatePicker() {
           $(".dynamic-datepicker").each(function () {
               // Ensure DatePicker is not reinitialized multiple times
               if (!$(this).data('kvDatepicker')) {
                   $(this).kvDatepicker({
                       autoclose: true,
                       todayHighlight: true,
                       format: 'yyyy-mm-dd'
                   });
               }
           });
       }

       // Reinitialize DatePicker after adding a new field
       $(".dynamicform_wrapper").on("afterInsert", function () {
           reinitDatePicker();
       });

       // Ensure DatePicker is initialized on page load
       reinitDatePicker();
   });



    $(document).ready(function() {
        function toggleSiblingForm() {
            var value = $('#studentinfo-have_sibling').val();
            if (value === 'YES') {
                $('#sibling-form').show();
            } else {
                $('#sibling-form').hide();
            }
        }
        
        // On page load
        toggleSiblingForm();
        
        // On dropdown change
        $('#studentinfo-have_sibling').change(function() {
            toggleSiblingForm();
        });
    });



    $('#user-agree_terms').change(function() {
        if ($(this).is(':checked')) {
            $('#studentinfo-permanent_district_id').val($('#studentinfo-present_district_id').val()).trigger('change');
            $('#studentinfo-permanent_state_id').val($('#studentinfo-present_state_id').val()).trigger('change');
            $('#studentinfo-permanent_pincode').val($('#studentinfo-present_pincode').val());
            $('#studentinfo-permanent_address').val($('#studentinfo-present_address').val());
        } else {
            $('#studentinfo-permanent_district_id').val('').trigger('change');
            $('#studentinfo-permanent_state_id').val('').trigger('change');
            $('#studentinfo-permanent_pincode').val('');
            $('#studentinfo-permanent_address').val('');
        }
    });



    $(document).on("change","#studentinfo-s_img",function(){
      
      
        var image = document.getElementById("picture");
        image.src = URL.createObjectURL(event.target.files[0]);

});



// $(".select").select2();
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    // $(".select").select2();
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});


JS
);
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
</style>
