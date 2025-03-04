<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParticularPrint $model */

$this->title = 'Update Particular Print: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Particular Prints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="particular-print-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
