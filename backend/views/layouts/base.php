<?php
use backend\assets\BackendAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="no-js css-menubar" lang="en">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
    <link rel="apple-touch-icon" href="/admin/libs/base/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/admin/libs/base/assets/images/favicon.ico">
    <!-- Stylesheets -->

        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


    </head>
    <body class="animsition dashboard">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?php $this->beginBody() ?>
        <?php echo $content ?>

    <?php
    $this->registerJs( <<<JS
Config.set('assets', '../assets');
Breakpoints();
JS
    );
    ?>
    <?php
    Modal::begin();
    Modal::end();
    ?>
    <?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>


</html>
<?php $this->endPage() ?>