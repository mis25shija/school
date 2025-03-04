<?php

use app\models\AcademicSession;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcademicSessionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Academic Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-session-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academic Session', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'session_name',
            'class_info_id',
            'session_start_date',
            'session_end_date',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcademicSession $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
