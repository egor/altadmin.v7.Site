<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.ico">

        <title><?php echo $this->pageTitle; ?></title>
        <meta name="keywords" content="<?php echo $this->metaKeywords; ?>" />
        <meta name="description" content="<?php echo $this->metaDescription; ?>" />
        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/carousel.css" rel="stylesheet">
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
    <body role="document">
        <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
        <hr class="horizontal-menu-hr">

        <div class="container marketing">
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'homeLink' => '<li><a href="/">Главная</a></li>',
                'tagName' => 'ol',
                'separator' => ' ',
                'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                'htmlOptions' => array('class' => 'breadcrumb'),
            ));
            ?>
            <div class="row"><?php echo $content; ?></div>
            <hr class="featurette-divider">
            <p class="pull-right"><a href="#">Наверх</a></p>
            <br clear="all"/>
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
                    <br clear="all" />
                    <div class="privacy" style="width: 100%; overflow: hidden; margin-top: 30px; font-size: 13px;">
                        <div style="text-align: left; width: 60%; float: left;"><?php echo FrontEditFields::getSettings('FooterSettings', 'copy'); ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'footer', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('FooterSettings', 'copy') ))); ?></div>
                        <div style="text-align: right; width: 40%; float: left;">Разработка сайта: студия <a href="http://alt.dp.ua" target="_blank">ALT</a></div>
                    </div>
                </div>
            </footer>
        </div>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/docs.min.js"></script>
        <!-- <?php $this->widget('application.widgets.DevInfo'); ?> -->
    </body>
</html>