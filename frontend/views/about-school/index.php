<?php

use app\models\AboutSchool;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AboutSchoolSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'About Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-school-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create About School', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'heading',
            'body:ntext',
            'created_by',
            'created_date',
            //'record_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AboutSchool $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
