<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentCategory $model */

$this->title = 'Create Student Category';
$this->params['breadcrumbs'][] = ['label' => 'Student Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
