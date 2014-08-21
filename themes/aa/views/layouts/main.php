<!DOCTYPE html>
<html lang="ru">

    <head>

        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo $this->metaKeywords; ?>" />
        <meta name="description" content="<?php echo $this->metaDescription; ?>" />
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/flexslider.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/alt.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-57-precomposed.png">
        <?php
        if (Yii::app()->params['altadmin']['modules']['gallery']['work']) {
            ?>
            <!-- standart gallery -->
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/lightbox.css" rel="stylesheet">
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightbox.js"></script>
            <?php
        }
        ?>
    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <h1>
                                <a class="brand" href="/"> &nbsp; </a>
                            </h1>
                            <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $content; ?>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="widget span3">
                        <?php $this->widget('application.widgets.Menu', array('method' => 'footerMenu')); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock1'); ?>
                        <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'AddBlock1') ))); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock2'); ?>
                        <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'AddBlock2') ))); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock3'); ?>
                        <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'AddBlock3') ))); ?>
                    </div>
                </div>
                <div class="footer-border"></div>
                <div class="row">
                    <div class="copyright span4">
                        <p><?php echo FrontEditFields::getSettings('FooterSettings', 'copy'); ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'copy') ))); ?></p>
                    </div>
                    <div class="social span8">
                        Разработка сайта: студия <a href="http://alt.dp.ua" target="_blank">ALT</a>
                        <!--<a class="facebook" href=""></a>
                        <a class="dribbble" href=""></a>
                        <a class="twitter" href=""></a>
                        <a class="pinterest" href=""></a>-->
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tweet.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jflickrfeed.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ui.map.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.quicksand.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>

    </body>

</html>