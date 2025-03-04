<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WeekDays $model */

$this->title = 'Create Week Days';
$this->params['breadcrumbs'][] = ['label' => 'Week Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-days-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
