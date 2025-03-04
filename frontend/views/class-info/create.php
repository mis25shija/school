<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClassInfo $model */

$this->title = 'Create Class Info';
$this->params['breadcrumbs'][] = ['label' => 'Class Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
