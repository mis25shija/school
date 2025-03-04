<?php

use app\models\District;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var app\models\DistrictSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Districts';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index">

    
    <div class="row"> <!-- Start 1st row -->
        <div class="col-lg-4">

            <div class="row">
                <div class="col-md-12">
                   <div class="card" style="height: 500px">
                       <div class="card-header">
                         <h5 class="text-olive"><i class="fa fa-map-marked"></i> District Info</h5>  
                       </div>
                       <div class="card-body">
                        <div class="district-form">

                            <?php $form = ActiveForm::begin(['id'=>'district']); ?>

                            <div class="row" style="border-bottom: solid 1px #ebebeb">
                                <div class="col-md-10">
                                  <?= $form->field($model, 'district_name')->textInput(['maxlength' => true])->label(false) ?>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= Html::submitButton('Add', ['class' => 'btn btn-success btn-md']) ?>
                                    </div>
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        <br>
                        
                            <div  style="height: 300px;" class=" table-responsive">

                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    // 'filterModel' => $searchModel,
                                    'tableOptions' => ['class'=>'table table-hover', 'style'=>'font-size:13px;color:gray;'],
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                       
                                        'district_name',
                                        
                                        [
                                            'class' => ActionColumn::className(),
                                            'urlCreator' => function ($action, District $model, $key, $index, $column) {
                                                return Url::toRoute([$action, 'id' => $model->id]);
                                             }
                                        ],
                                    ],
                                ]); ?>
                                
                        </div>
                           
                       </div>
                   </div> 
                </div>
            </div>
            
        </div>
        <div class="col-lg-4">

            <div class="card" style="height: 500px">
                <div class="card-header">
                    <h5 class="text-olive"><i class=" fa fa-calendar-week"></i> Week-Days Info</h5>
                </div>
                <div class="card-body">
                    <div class="week-days-form">

                        <?php $form = ActiveForm::begin(['id'=>'week']); ?>

                            <div class="row">
                                <div class="col-md-10">
                                    <?= $form->field($modelweek, 'day_name')->textInput(['maxlength' => true])->label(false) ?>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                                    </div> 
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>
                    </div>

                    <div class="table-responsive" style="height: 300px">

                        <?= GridView::widget([
                            'dataProvider' => $dataProviderWeek,
                            // 'filterModel' => $searchModel,
                            'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px;color:gray'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                               
                                [
                                    'attribute' => 'day_name',
                                    'label' => 'Week-Days',
                                ],
                                
                                // [
                                //     'class' => ActionColumn::className(),
                                //     'urlCreator' => function ($action, WeekDays $modelweek, $key, $index, $column) {
                                //         return Url::toRoute([$action, 'id' => $modelweek->id]);
                                //      }
                                // ],
                            ],
                        ]); ?>
                        
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-lg-4">

            <div class="card" style="height: 500px">
                <div class="card-header">
                    <h5 class="text-olive"><i class=" fa fa-atlas"></i> State Info</h5>
                </div>
                <div class="card-body">
                    <div class="state-form">

                        <?php $form = ActiveForm::begin(['id'=>'state']); ?>

                            <div class="row">
                                <div class="col-md-10">
                                    <?= $form->field($modelstate, 'state_name')->textInput(['maxlength' => true])->label(false) ?>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                                    </div> 
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>
                    </div>

                    <div class="table-responsive" style="height: 300px">

                        <?= GridView::widget([
                            'dataProvider' => $dataProviderState,
                            // 'filterModel' => $searchModel,
                            'tableOptions' => ['class'=>'table table-hover','style'=>'font-size:13px;color:gray'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                               
                                [
                                    'attribute' => 'state_name',
                                    'label' => 'State',
                                ],
                                
                                // [
                                //     'class' => ActionColumn::className(),
                                //     'urlCreator' => function ($action, WeekDays $modelweek, $key, $index, $column) {
                                //         return Url::toRoute([$action, 'id' => $modelweek->id]);
                                //      }
                                // ],
                            ],
                        ]); ?>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div> <!-- end 1st row -->

    <div class="row">
      <div class="col-lg-4">

        <div class="card" style="height: 350px">
            <div class="card-header">
                <h5 class="text-olive"><i class="fa fa-praying-hands"></i> Religion Category</h5>
            </div>
            <div class="card-body">

                <div class="religion-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-md-9">
                          <?= $form->field($modelrel, 'religion_name')->textInput(['maxlength' => true])->label(false) ?>  
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <?= Html::submitButton('Add', ['class' => 'btn btn-md btn-success']) ?>
                            </div>
                            
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

                <div class="table-responsive" style="height: 300px">

                    <?= GridView::widget([
                        'dataProvider' => $dataProviderReligion,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'religion_name',
                            // 'created_by',
                            // 'created_date',
                            // 'updated_by',
                            //'updated_date',
                            //'record_status',
                            // [
                            //     'class' => ActionColumn::className(),
                            //     'urlCreator' => function ($action, Religion $model, $key, $index, $column) {
                            //         return Url::toRoute([$action, 'id' => $model->id]);
                            //      }
                            // ],
                        ],
                    ]); ?>
                    
                </div>
                
            </div>
        </div>
          
      </div>  
      <div class="col-lg-8">

        <div class="card" style="height: 350px">
            <div class="card-header">
               <h5 class="text-olive"><i class="fa fa-list"></i> Student Category</h5> 
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">

                        <div class="student-category-form table-responsive" style="height: 250px;">

                            <?php $form = ActiveForm::begin(['id'=>'stud-cat']); ?>

                            <?= $form->field($modelstud, 's_cat_name')->textInput(['maxlength' => true])->label('Category Name') ?>

                            <?= $form->field($modelstud, 's_description')->textarea(['rows' => 2])->label('Description') ?>

                            <div class="form-group">
                                <?= Html::submitButton('Add', ['class' => 'btn btn-block btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        
                    </div>
                    <div class="col-md-7">

                        <div class="table-responsive" style="height: 250px">

                            <?= GridView::widget([
                                'dataProvider' => $dataProviderStud,
                                // 'filterModel' => $searchModel,
                                'tableOptions' => ['class'=>'table table-hover text-secondary','style'=>'font-size:13px'],
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    // 'id',
                                    's_cat_name',
                                    's_description:ntext',
                                    // 'created_by',
                                    // 'created_date',
                                    //'updated_by',
                                    //'updated_date',
                                    //'record_status',
                                    // [
                                    //     'class' => ActionColumn::className(),
                                    //     'urlCreator' => function ($action, StudentCategory $model, $key, $index, $column) {
                                    //         return Url::toRoute([$action, 'id' => $model->id]);
                                    //      }
                                    // ],
                                ],
                            ]); ?>
                            
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
          
      </div>
    </div>

    <div class="row"> <!-- start 3rd row -->

        <div class="col-lg-12">
            <div class="card" style="height: 450px">
                <div class="card-body">

                    <h5 class="text-olive"> <i class="fa fa-th-list"></i> Social-Category Info</h5>
                    <hr style="border: solid 1px #ebebeb">

                    <div class="row">
                        <div class="col-md-5" >
                          <div class="general-category-form" style="height: 300px">

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($modelcat, 'g_cat_name')->textInput(['maxlength' => true])->label('Category Name') ?>

                            <?= $form->field($modelcat, 'g_description')->textarea(['rows' => 3])->label('Discription') ?>

                            <br>
                            <div class="form-group text-center">
                                <?= Html::submitButton('Add', ['class' => 'btn btn-block btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>  
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive" style="height: 300px">
                                
                            
                                <?= GridView::widget([
                                    'dataProvider' => $dataProviderCat,
                                    // 'filterModel' => $searchModel,
                                    'tableOptions' => ['class' => 'table table-hover text-secondary','style' => 'font-size:13px;'],
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        // 'id',
                                        
                                        [
                                            'attribute' => 'g_cat_name',
                                            'label' => 'Category Name',
                                        ],
                                        
                                        [
                                            'attribute' => 'g_description',
                                            'label' => 'Description',
                                        ],
                                        
                                        // [
                                        //     'class' => ActionColumn::className(),
                                        //     'urlCreator' => function ($action, GeneralCategory $model, $key, $index, $column) {
                                        //         return Url::toRoute([$action, 'id' => $model->id]);
                                        //      }
                                        // ],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div><!-- end 3rd row -->




</div>

<style type="text/css">
    .control-label{

        color: gray;
        font-size:14px;
    }
    .help-block{

        color: red;
    }
    th>a{

        color: #5c6b06;
    }
    .summary{

        color: gray;
        font-size:13px;
    }

    thead{
        background: #ecfc92;
        
        
    }
    .table thead th {
    
    border: none;

}

</style>


