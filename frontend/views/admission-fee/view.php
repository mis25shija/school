<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AdmissionFee $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admission Fees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admission-fee-view">

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
            'new_student_adm_fee',
            'old_student_adm_fee',
            'class_info_id',
            'session_id',
            'fine_amount',
            'adm_last_date',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'record_status',
        ],
    ]) ?>

</div>
