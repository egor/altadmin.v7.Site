<!DOCTYPE html>
<html lang="ru">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo $this->metaKeywords; ?>" />
        <meta name="description" content="<?php echo $this->metaDescription; ?>" />
        <meta name="author" content="">

        <title><?php echo $this->pageTitle; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=cyrillic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/alt.css" rel="stylesheet">
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

        <div class="brand">AltAdmin Site</div>
        <div class="address-bar">Демонстрация пакета "Сайт"</div>

        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">Business Casual</a>
                </div>
                <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">



            <?php echo $content; ?>


        </div>
        <!-- /.container -->

        <footer>
            <div class="container">
                <div class="fmenuc">
                    <?php $this->widget('application.widgets.Menu', array('method' => 'footerMenu')); ?>
                </div>
                <div class="fmenuc">
                    <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock1'); ?>
                    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'addBlock1') ))); ?>
                </div>
                <div class="fmenuc">
                    <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock2'); ?>
                    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'addBlock2') ))); ?>
                </div>
                <div class="fmenuc">
                    <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock3'); ?>
                    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'addBlock3') ))); ?>
                </div>
                <div class="row">                    
                    <div class="col-lg-12 text-center" style="margin-top: 20px; margin-bottom: 20px;">
                        <hr>
                        <div class="span8" style="text-align: left; width: 60%; float: left;"><?php echo FrontEditFields::getSettings('FooterSettings', 'copy'); ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'copy') ))); ?></div>
                        <div class="span4" style="text-align: right; width: 40%; float: left;">Разработка сайта: студия <a href="http://alt.dp.ua" target="_blank">ALT</a></div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

    </body>

</html>
