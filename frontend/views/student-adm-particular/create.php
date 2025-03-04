<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentAdmParticular $model */

// $this->title = 'Create Student Adm Particular';
// $this->params['breadcrumbs'][] = ['label' => 'Student Adm Particulars', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-adm-particular-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
