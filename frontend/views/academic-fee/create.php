<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcademicFee $model */

$this->title = 'Create Academic Fee';
$this->params['breadcrumbs'][] = ['label' => 'Academic Fees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-fee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
