<?php

use app\models\ConceptRegistration;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\AcademicSession;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistrationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$session= ArrayHelper::map(AcademicSession::find()->all(), 'id', 'session_name');
$currentsession = AcademicSession::find()->where(['active_status'=>'1'])->one();
?>
<div class="concept-registration-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="text-olive"><i class="fa fa-globe"></i> Online Registration List <span><b><?= 
            $currentsession->session_name ?></b></span></h4>
        </div>
        <div class="card-body table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute'=>'application_date',
                        'value' =>function($model){

                            return isset($model->application_date) ? date('d-m-Y',strtotime($model->application_date)) : 'NA';
                        },
                        'filter' => \kartik\date\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'application_date',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose' => true,
                        ],
                    ]),
                    ],

                    // [
                    //     'attribute'=>'session_id',
                    //     'label' => 'Session',
                    //     'value'=>function($model) use($session){

                    //         return isset($model->session_id) ? $session[$model->session_id] : 'NA';
                    //     },

                    //     'filter' => $session,
                    // ],
                    
                    [
                        'attribute' => 'student_name',
                        'label' => 'Student Info',
                        'value' => function($model){

                            return "<div><p> Student Name : ".$model->student_name."</p><p> Date of Birth : ".$model->dob."&emsp; Age : ".$model->age."</p><p> Gender : ".$model->gender."</p><p> Phone : ".$model->phone_no."</p><p> Aadhaar : ".$model->student_aadhaar_no."</p><p> Email : ".$model->email."</p></div>";
                        },
                        'format' => 'raw',
                    ],
                    
                    // 'dob',
                    //'age',
                    //'gender',
                    //'phone_no',
                    //'email:email',
                    //'student_aadhaar_no',
                    //'general_category_id',
                    //'father_name',
                    //'father_occupation',
                    //'father_annual_income',
                    //'mother_name',
                    //'mother_occupation',
                    //'mother_annual_income',
                    //'parent_phone',
                    //'parent_alt_phone',
                    //'present_address',
                    //'present_district_id',
                    //'present_state_id',
                    //'present_pincode_id',
                    //'permanent_address',
                    //'permanent_district_id',
                    //'permanent_state_id',
                    //'permanent_pincode_id',
                    //'previous_school_name',
                    //'previous_school_board',
                    //'payment_upload',
                    //'record_status',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, ConceptRegistration $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                         }
                    ],
                ],
            ]); ?>    
        </div>
    </div>
</div>
<style type="text/css">
    .table th{
        white-space: nowrap;
        background: #dbfca2;
    }
    th>a{

        color: #548009;
    }
    
</style>
