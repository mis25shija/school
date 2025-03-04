<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WebsiteStaffDisplay $model */

$this->title = 'Create Website Staff Display';
$this->params['breadcrumbs'][] = ['label' => 'Website Staff Displays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-staff-display-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
