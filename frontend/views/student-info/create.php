<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentInfo $model */

// $this->title = 'Create Student Info';
// $this->params['breadcrumbs'][] = ['label' => 'Student Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-info-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modelitem' => $modelitem,
    ]) ?>

</div>
