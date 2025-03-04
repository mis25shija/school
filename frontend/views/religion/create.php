<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Religion $model */

$this->title = 'Create Religion';
$this->params['breadcrumbs'][] = ['label' => 'Religions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="religion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
