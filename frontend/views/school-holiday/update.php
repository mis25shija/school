<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SchoolHoliday $model */

$this->title = 'Update School Holiday: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'School Holidays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-holiday-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
