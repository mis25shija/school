<?php

use app\models\ProductCategory;
use app\models\ProductItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use app\models\SubscriptionPLan;
/** @var yii\web\View $this */
/** @var app\models\SubProductCategory $model */
/** @var yii\widgets\ActiveForm $form */
$pro = ArrayHelper::map(ProductCategory::find()->all(), 'id', 'category_name');
$sub = ArrayHelper::map(SubscriptionPLan::find()->all(), 'id', 'subscription_name');

/** @var yii\web\View $this */
/** @var app\models\ProductCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Product Categories';
// $this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


<div class="container">
    <div class="row ">
        <div class="col-md-3">
            <a class="card text-secondary btn" href="http://localhost/working_yii/index.php?r=carousel/index">
                <div class="card-body text-center">
                    
                    <h4>Slider Banner</h4>
                    <div class="fas fa-images fa-2x"></div>
                    
                </div>
                
            </a>
        </div>

        <div class="col-md-3">
            <a class="card text-secondary btn" href="http://localhost/working_yii/index.php?r=department-info/index">
                <div class="card-body text-center">
                    
                    <h4>Departments</h4>
                    <div class="fas fa-id-badge fa-2x"></div>
                    
                </div>
        
            </a>
        </div>
    </div>    
</div>

<style type="text/css">



/*.order-card {
    color: #fff;
}*/

/*.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}*/




.card {
    border-radius: 10px;
    box-shadow: 0 2px 4px 1px rgba(4,26,55,0.16);   
}

.card :hover {
  opacity: 0.5;
  /*background: #f7f9fa;*/

}
/*.btn :hover{
  transform: scale(0.99);
}*/



</style>