<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GeneralCategory $model */

$this->title = 'Update General Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'General Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="general-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
