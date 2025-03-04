
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;

// $successMessage = Yii::$app->session->getFlash('success');
// $errorMessage = Yii::$app->session->getFlash('error');

$successMessage = Yii::$app->session->hasFlash('success') ? Yii::$app->session->getFlash('success') : '';
$errorMessage = Yii::$app->session->hasFlash('error') ? Yii::$app->session->getFlash('error') : '';

$this->registerJs('
    $(document).ready(function() {
        // Check if there is a success flash message
        if ("' . $successMessage . '") {

            alertify.set("notifier","position", "top-center");
            alertify.success("' . $successMessage . '");
        }
        
        // Check if there is an error flash message
        if ("' . $errorMessage . '") {

            alertify.set("notifier","position", "top-center");
            alertify.error("' . $errorMessage . '");
        }
    });
');

?>
<div class="content-wrapper " style="background: #fcfcfc">
    <!-- Content Header (Page header) -->
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <?php
                    // echo common\widgets\Alert::widget();
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content ">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<style type="text/css">
    /*.swal-button {
          padding: 7px 19px;
          border-radius: 5px;
          background-color: #3d9970;
          font-size: 12px;
          border: 1px solid #3e549a;
          text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }*/

    .alertify-notifier .ajs-message{
        color: white;
    }
</style>