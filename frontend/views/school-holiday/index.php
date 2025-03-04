<?php

use app\models\SchoolHoliday;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SchoolHolidaySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'School Holidays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-holiday-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create School Holiday', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'start_date',
            'end_date',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SchoolHoliday $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
