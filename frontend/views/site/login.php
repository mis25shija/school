<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    


<div class="col-lg-8 text-center" style="height: 100vh;display: flex; ">
    <img src="docs/login.jpg" style="width:100%;height:100%;object-fit: cover">
</div>
    

<div class="site-login col-lg-4 elevation-1" style="height: 100vh;background: #96ffb8">

    <!-- <div class="text-center p-2">
       <img src="docs/cleannew.png" style="height:15%;width:15%;object-fit: contain;border: solid 2px #248291;border-radius: 50%" > 
    </div> -->

    <div class="text-center">
       <h4 style="font-family: 'Helvetica', Sans-serif;">Testing</h4>
    </div>
    
    
    <div style="padding: 15px">
        <!-- <hr style="border: solid 1px #3ef0a5"> -->
       <h3 style="color: #14914d"><?= Html::encode($this->title) ?></h3>

    <p style="color: #14914d">Please fill out the following fields to login:</p>

   
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="my-1 mx-0" style="color:#999;">
                    <!-- If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>. -->
                    <br>
                    <!-- Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?> -->
                </div>

                

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => ' font-weight-bold btn btn-block btn-secondary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
       
    </div>

    
    
</div>
</div>