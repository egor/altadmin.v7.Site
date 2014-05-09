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
    </head>   
    <body>
        <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
        <?php $this->widget('application.widgets.MainPage', array('method' => 'slider')); ?>
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
            <h1><?php echo $this->pageHeader; ?></h1>
            <?php echo $content; ?>
            <hr class="featurette-divider">           
            <footer>
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/docs.min.js"></script>
    </body>
</html>