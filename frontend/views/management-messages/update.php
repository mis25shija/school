<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ManagementMessages $model */

// $this->title = 'Update Management Messages: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Management Messages', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="management-messages-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
