<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcademicFee $model */

$this->title = 'Update Academic Fee: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Academic Fees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academic-fee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
