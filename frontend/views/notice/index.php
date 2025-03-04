<?php

use app\models\Notice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use kartik\date\DatePicker;
/** @var yii\web\View $this */
/** @var app\models\NoticeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Notices';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="text-olive"><i class="fa fa-bullhorn"></i> Add School Notice</h4> 
                </div>
                <div class="card-body">
                    <div class="notice-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>   
                        </div>
                        <div class="col-sm-6">
                            <?=  $form->field($model, 'notice_date')->widget(
                                            DatePicker::classname(), [
                                            
                                            
                                            'options' => ['placeholder' => 'Enter date ...'],
                                            
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'format' => 'yyyy-mm-dd',
                                            ]
                                        ])->label('Notice Date'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'body')->textarea(['rows' => 3]) ?>   
                        </div>
                    </div>                   

                    <div class="form-group text-center">
                        <?= Html::submitButton('Submit ', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body table-responsive">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => ['class'=>'table','style'=>'font-size:13px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            [
                                'attribute' => 'notice_date',
                                'value' =>function($model){

                                    return date('d-m-Y',strtotime($model->notice_date));
                                },
                                'filter' => DatePicker::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'notice_date',
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd', // Ensure this matches DB format
                                    ],
                                ]),
                            ],
                            'header',
                            
                            [
                                'attribute'=>'body',
                                'value' => function($model){

                                    return $model->body;
                                },
                                'contentOptions'=>['style'=>'white-space:normal;max-width:200px;word-break:break-word'],

                            ],
                            // 'created_by',
                            // 'created_date',
                            //'record_status',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Notice $model, $key, $index, $column) {
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

<style type="text/css">
   .table th{
        white-space: nowrap;
        background: #dbfca2;
    }
    th>a{

        color: #548009;
    }
    .control-label{

        color: gray;
        font-size: 14px;
    }
    .help-block{

        color: red;
    }

    .modal-header{
      background: #1fc467;
    }
</style>

<?php

        Modal::begin([

                  'title' => '<h4 class = "text-light">Update Notice</h4>',

                  'id' => 'jobPop',

                  'size' => 'modal-lg',
                  'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
                  


              ]);


       

        Modal::end();
?>


<?php
$this->registerJS('


$(document).on("change","#schoolfeatures-icn",function(){
         
    var image = document.getElementById("picture");
    image.src = URL.createObjectURL(event.target.files[0]);

});




$(document).on("change","#icon",function(){
           
    var image = document.getElementById("picture1");
    image.src = URL.createObjectURL(event.target.files[0]);
     
});


   $(".popup").click(function(e) {
     e.preventDefault();
     $("#jobPop").modal("show").find(".modal-body")
     .load($(this).attr("href"));
   });



');


?>
