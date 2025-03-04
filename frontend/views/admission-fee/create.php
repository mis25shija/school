<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdmissionFee $model */

$this->title = 'Create Admission Fee';
$this->params['breadcrumbs'][] = ['label' => 'Admission Fees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admission-fee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
