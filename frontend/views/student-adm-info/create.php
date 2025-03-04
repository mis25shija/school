<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentAdmInfo $model */

// $this->title = 'Create Student Adm Info';
// $this->params['breadcrumbs'][] = ['label' => 'Student Adm Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-adm-info-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'details' => $details,
        'update' => $update,
    ]) ?>

</div>
