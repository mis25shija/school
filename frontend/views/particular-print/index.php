<?php

use app\models\ParticularPrint;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ParticularPrintSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Particular Prints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="particular-print-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Particular Print', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'invoice',
            'print_date',
            'record_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ParticularPrint $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
