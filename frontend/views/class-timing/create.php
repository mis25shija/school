<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClassTiming $model */

$this->title = 'Create Class Timing';
$this->params['breadcrumbs'][] = ['label' => 'Class Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-timing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
