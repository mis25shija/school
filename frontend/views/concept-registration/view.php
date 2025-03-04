<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistration $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concept Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="concept-registration-view">

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
            'session_id',
            'application_date',
            'student_name',
            'dob',
            'age',
            'gender',
            'phone_no',
            'email:email',
            'student_aadhaar_no',
            'general_category_id',
            'father_name',
            'father_occupation',
            'father_annual_income',
            'mother_name',
            'mother_occupation',
            'mother_annual_income',
            'parent_phone',
            'parent_alt_phone',
            'present_address',
            'present_district_id',
            'present_state_id',
            'present_pincode_id',
            'permanent_address',
            'permanent_district_id',
            'permanent_state_id',
            'permanent_pincode_id',
            'previous_school_name',
            'previous_school_board',
            'payment_upload',
            'record_status',
        ],
    ]) ?>

</div>
