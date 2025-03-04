<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClassTiming $model */

$this->title = 'Update Class Timing: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Class Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="class-timing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
