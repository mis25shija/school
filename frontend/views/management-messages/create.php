<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ManagementMessages $model */

$this->title = 'Create Management Messages';
$this->params['breadcrumbs'][] = ['label' => 'Management Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="management-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
