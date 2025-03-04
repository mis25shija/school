<?php

use app\models\StudentInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn; 
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use app\models\ClassInfo;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\OfflineCustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Offline Customers';
// $this->params['breadcrumbs'][] = $this->title;
$class = ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');
// $cus = ArrayHelper::map(OfflineCustomer::find()->all(), 'id', 'customer_name');

?>
<div class="student-info-index">

  <?php echo $this->render('_search', ['model' => $model]); ?>

  <?php  

      if(isset($dataProvider)) {

  ?>

  <div class="card card-outline card-success" style="padding: 10px">
    
  

    <h5 class="text-success"><b>Student List</b></h5>

    <?php if ($dataProvider->getCount() > 0) {  ?>

    <div class="table-responsive">

     <?php

          echo  GridView::widget([

              'dataProvider' => $dataProvider,

              // 'filterModel' => $searchModel,

              'tableOptions' =>['class' => 'table','style'=>'font-size:13px'],

              // 'showFooter' => true,

              'columns' => [

                  ['class' => 'yii\grid\SerialColumn'],

                  // 'id',
                  // 'auth_key',
                  // 'password_hash',
                  // 'std_adm_no',
                  // 'adm_date',
                  

                  [
                    'attribute' => 'stud_name',
                    'label' => 'Student Info',
                    'value' => function($model){

                      return "<div style = 'background: #faffc9;padding:10px;border-radius: 7px'><p><b>Student Name : </b>".$model->stud_name."&emsp;&emsp;<span> <b> Aadhaar : </b>".$model->stud_aadhaar_no."</span>"."</p><p><b>Father Name : </b>".$model->father_name."&emsp;&emsp;<span> <b>Mother Name : </b>".$model->mother_name."</span>"."</p><P>"."<b>Permanent Address : </b>".$model->permanent_address."</p></div>";
                    },
                    'format' => 'raw',
                  ],
                  //'stud_photo',
                  //'stud_dob',
                  //'gender',
                  //'stud_email:email',
                  //'stud_aadhaar_no',
                  //'std_id_mark',
                  
                  [
                    'attribute' => 'course_id',
                    'label' => 'Class',
                    'value' => function($model) use($class){
                      return isset($model->course_id) ? $class[$model->course_id] : '';
                    }
                  ],
                  
                  
                  [
                    'attribute' => 'stud_type',
                    'label' => 'Student Type',
                  ],

                  [
                    'attribute' => 'admission_status',
                    'label' => 'Admission Status',
                    'value' => function($model){

                              if ($model->admission_status == 'ADMITTED') {
                                  
                                    return "<p class = 'badge badge-success'>".$model->admission_status."</p>";
                              }elseif ($model->admission_status == 'NOT ADMITTED') {
                                    return "<p class = 'badge badge-danger'>".$model->admission_status."</p>";
                              }else{

                                  return "<p class = 'badge badge-warning'>".$model->admission_status."</p>";
                              }
                    },
                    'format' => 'raw',
                  ],
                  
                  

                  // [
                  //   'value' => function ($model) {
                  //     return Html::a('<span class="fa fa-school"></span>', ['student-adm-info/create', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']);  
                  //               },
                  //               'format' => 'raw',
                  // ],

                  // [
                  //   'value' => function ($model) {
                  //     return Html::a('<span class="fa fa-print"></span>', ['offline-customer/assign', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']);  
                  //               },
                  //               'format' => 'raw',
                  // ],


                  [
                    'value' => function ($model) {
                      return '<div class="dropdown ">
                                <button class="btn  btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"><span class = "fa fa-bars "></span>
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu text-center">
                                <li class = "dropdown-item">'.Html::a('Admit Now',Url::to(['student-adm-info/create','id'=>$model->id]), ['style'=>'background:none;border:none;color:gray']).' </li>
                                <div class="dropdown-divider"></div>
                                <li class = "dropdown-item">'.Html::a('Update Info',Url::to(['student-info/edit','id'=>$model->id]), ['style'=>'background:none;border:none;color:gray']).' </li>
                                <div class="dropdown-divider"></div>
                                <li class = "dropdown-item">'.Html::a('Admission Details',Url::to(['student-adm-particular/index','id'=>$model->id]), ['style'=>'background:none;border:none;color:gray']).' </li>
                                <div class="dropdown-divider"></div>
                                <li class = "dropdown-item">'.Html::a('Print',Url::to(['student-adm-info/print','id'=>$model->id]), ['style'=>'background:none;border:none;color:gray']).' </li>
                                
                                </ul>
                              </div>';
                          },
                                'format' => 'raw',
                  ],
              

              ],

          ]); 
      ?>

</div>
<?php }else{?>

  <div class="text-center">
    <img src="docs/nodata.png" style="height: 200px;object-fit: contain">
    <p class="text-center" style="font-size: 17px;color: #929394;margin-left: 20px;"><b>NO RECORD FOUND</b></p>
  </div>

<?php } ?>
</div>

<?php } ?>

</div>

<?php

        Modal::begin([

                  'title' => '<h4 class = "text-light">Assign Delivery</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-md',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>



<style type="text/css">
    a,th {

        color: #17a2b8;
    }
    .control-label{

      color: #8a8888;
    }
    .modal-header{

        background: #17a2b8;
    }
    th>a{

      color: gray;
    }
    th{

      color: gray;
    }
    .summary{
      font-size: 12px;
    }

    table{
      white-space: nowrap;
    }
</style>

<?php

$this->registerJs('

    $(".popup").click(function(e) {
         e.preventDefault();
         $("#jobPop").modal("show").find(".modal-body")
         .load($(this).attr("href"));
       });
   

') ?>
