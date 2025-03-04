<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistration $model */

$this->title = 'Update Concept Registration: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concept Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concept-registration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
