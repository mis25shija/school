<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SchoolHoliday $model */

$this->title = 'Create School Holiday';
$this->params['breadcrumbs'][] = ['label' => 'School Holidays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-holiday-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
