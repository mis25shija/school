<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdmissionFee $model */

$this->title = 'Update Admission Fee: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admission Fees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admission-fee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
