<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SchoolDetail $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'School Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="school-detail-view">

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
            'school_name',
            'school_photo',
            'school_address:ntext',
            'school_phone',
            'school_alt_phone',
            'cut_off_attendence',
            'reg_no_prefix',
            'admission_no_prefix',
            'receipt_prefix',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'record_status',
        ],
    ]) ?>

</div>
