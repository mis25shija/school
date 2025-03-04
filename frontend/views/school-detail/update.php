<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SchoolDetail $model */

// $this->title = 'Update School Detail: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'School Details', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-detail-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'update' => true,
    ]) ?>

</div>
