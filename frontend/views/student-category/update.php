<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentCategory $model */

$this->title = 'Update Student Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
