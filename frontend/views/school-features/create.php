<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SchoolFeatures $model */

$this->title = 'Create School Features';
$this->params['breadcrumbs'][] = ['label' => 'School Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-features-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
