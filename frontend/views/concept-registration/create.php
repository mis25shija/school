<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ConceptRegistration $model */

$this->title = 'Create Concept Registration';
$this->params['breadcrumbs'][] = ['label' => 'Concept Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concept-registration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
