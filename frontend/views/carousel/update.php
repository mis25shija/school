<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Carousel $model */

// $this->title = 'Update Carousel: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Carousels', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="carousel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
