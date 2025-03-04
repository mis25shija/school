<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParticularPrint $model */

$this->title = 'Create Particular Print';
$this->params['breadcrumbs'][] = ['label' => 'Particular Prints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="particular-print-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
