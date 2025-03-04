<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SchoolFeatures $model */

// $this->title = 'Update School Features: ' . $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'School Features', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-features-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
