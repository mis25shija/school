<?php

use app\models\StudentInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StudentInfoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'auth_key',
            'password_hash',
            'std_adm_no',
            'adm_date',
            //'stud_name',
            //'stud_photo',
            //'stud_dob',
            //'gender',
            //'stud_email:email',
            //'stud_aadhaar_no',
            //'std_id_mark',
            //'course_id',
            //'session_id',
            //'section_id',
            //'student_category_id',
            //'general_category_id',
            //'religion_id',
            //'blood_group',
            //'mother_tongue',
            //'nationality',
            //'roll_no',
            //'father_name',
            //'father_occupation',
            //'father_annual_income',
            //'mother_name',
            //'mother_occupation',
            //'mother_annual_income',
            //'parent_phone',
            //'parent_alt_phone',
            //'permanent_address:ntext',
            //'permanent_pincode',
            //'permanent_district_id',
            //'permanent_state_id',
            //'present_address:ntext',
            //'present_pincode',
            //'present_district_id',
            //'present_state_id',
            //'have_sibling',
            //'sibling_id',
            //'stud_type',
            //'admission_status',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StudentInfo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
