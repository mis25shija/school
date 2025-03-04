<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Carousel $model */

$this->title = 'Create Carousel';
$this->params['breadcrumbs'][] = ['label' => 'Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
