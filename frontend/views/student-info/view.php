<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\StudentInfo $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'auth_key',
            'password_hash',
            'std_adm_no',
            'adm_date',
            'stud_name',
            'stud_photo',
            'stud_dob',
            'gender',
            'stud_email:email',
            'stud_aadhaar_no',
            'std_id_mark',
            'course_id',
            'session_id',
            'section_id',
            'student_category_id',
            'general_category_id',
            'religion_id',
            'blood_group',
            'mother_tongue',
            'nationality',
            'roll_no',
            'father_name',
            'father_occupation',
            'father_annual_income',
            'mother_name',
            'mother_occupation',
            'mother_annual_income',
            'parent_phone',
            'parent_alt_phone',
            'permanent_address:ntext',
            'permanent_pincode',
            'permanent_district_id',
            'permanent_state_id',
            'present_address:ntext',
            'present_pincode',
            'present_district_id',
            'present_state_id',
            'have_sibling',
            'sibling_id',
            'stud_type',
            'admission_status',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'record_status',
        ],
    ]) ?>

</div>
