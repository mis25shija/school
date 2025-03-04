<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WeekDays $model */

$this->title = 'Update Week Days: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Week Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="week-days-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
