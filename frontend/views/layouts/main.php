<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

if(yii::$app->controller->action->id === 'login'){
    echo $this->render(
        'main-login',
        ['content'=> $content]
    );
}else{

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>My App</title>
    <link rel="icon" href="<?= Yii::getAlias('@web') ?>/docs/fav.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web') ?>/docs/fav.png" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" >
<?php $this->beginBody() ?>
<div id="loader" style="display:none;">
    <div class="spinner"></div>
</div>

<div class="wrapper">
    <!-- Navbar -->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->render('footer') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php } ?>

<script>


    var currentController = "<?= Yii::$app->controller->id ?>";
    var currentAction = "<?= Yii::$app->controller->action->id ?>";

    // List of pages where the loader should be hidden
    var excludedPages = [
        {controller: 'expense-info', action: 'expensereport'}, // Example: Disable on 'registration/index'
    ];

    // Function to check if the loader should be excluded
    function isExcludedPage(controller, action) {
        return excludedPages.some(function(page) {
            return page.controller === controller && page.action === action;
        });
    }

    $(document).ready(function() {
        // Only apply the loader logic if the current page is NOT excluded
        if (!isExcludedPage(currentController, currentAction)) {
            // Show loader on link click
            // Show the loader when the page is unloading (changing)
        window.onbeforeunload = function() {
            document.getElementById('loader').style.display = 'flex';
        };

        // Hide the loader when the page fully loads
        window.onload = function() {
            document.getElementById('loader').style.display = 'none';
        };
        } else {
            // Show the loader when the page is unloading (changing)
        window.onbeforeunload = function() {
            document.getElementById('loader').style.display = 'none';
        };

        // Hide the loader when the page fully loads
        // window.onload = function() {
        //     document.getElementById('loader').style.display = 'none';
        // };
        }
    });

        

        // // Add loader for link clicks
        // document.querySelectorAll('a').forEach(function(link) {
        //     link.addEventListener('click', function() {
        //         document.getElementById('loader').style.display = 'flex';
        //     });
        // });

</script>

<style>
        /*loader css*/

#loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .spinner {
            border: 4px solid #d8e3de;
            border-top: 4px solid #02d67c;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

</style>