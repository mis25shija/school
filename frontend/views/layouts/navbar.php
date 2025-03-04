<?php

use yii\helpers\Html;
use yii\helpers\Url;
// use app\models\StaffInfo;


// $usr = Yii::$app->user->id;
// $staff = StaffInfo::find()->where(['user_id'=>$usr])->one();
// echo "<pre>"; print_r($staff)
?>
<!-- Navbar -->
<nav class=" main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link text-success" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=\yii\helpers\Url::home()?>" class="nav-link">Home</a>
        </li> -->
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
        
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item"> -->
            <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a> -->
            <!-- <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div> -->
        <!-- </li> -->

        
        
        
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->

        <li class="nav-item">

            
            <span>
                <h5>Welcome! <b style="color:#00bd6d"><?= 'Testing' ?></b></h5>
            </span>
            
            
            
            
        </li>
        <li class="nav-item">

            
            <span>
                &emsp;
            </span>
            
            
            
        </li>

        <!-- Notifications Dropdown Menu -->
        
           <?php if(Yii::$app->user->isGuest){?>

                <li class="nav-item">
                <?=Html::a('Login',Url::to(['site/login']),['icon'=>'fa fa-user']) ?></li>
                <?php }else{ ?> 

        <li class="nav-item dropdown">
            <a class="nav-link btn btn-outline-warning" data-toggle="dropdown" href="#">
                <i class="fas fa-sign-out-alt" style="font-size: 20px;color: #00bd6d"></i>
                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                
                <?= Html::a('Logout', ['/site/logout'], ['data-method' => 'post', 'class' => ' dropdown-item']) ?>

                <div class="dropdown-divider"></div>
                <?= Html::a('Change Password', ['/user/change_password'], ['data-method' => 'post', 'class' => ' dropdown-item']) ?>
                
            </div>
        </li>
        <?php } ?>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>
<!-- /.navbar -->