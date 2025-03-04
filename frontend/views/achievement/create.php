<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Achievement $model */

$this->title = 'Create Achievement';
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
