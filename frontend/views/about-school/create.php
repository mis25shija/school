<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AboutSchool $model */

// $this->title = 'Create About School';
// $this->params['breadcrumbs'][] = ['label' => 'About Schools', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-school-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
