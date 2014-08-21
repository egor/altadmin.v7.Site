<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta charset="utf-8">
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.ico" type="image/x-icon" />
        <meta name="keywords" content="<?php echo $this->metaKeywords; ?>" />
        <meta name="description" content="<?php echo $this->metaDescription; ?>" />
        <meta name="author" content="">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/alt.css" type="text/css" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script>

        <script type="text/javascript">if ($(window).width() > 1024) {
                document.write("<" + "script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.preloader.js'></" + "script>");
            }</script>
        <script>
            jQuery(window).load(function() {
                $x = $(window).width();
                if ($x > 1024)
                {
                    jQuery("#content .row").preloader();
                }

                jQuery(".list-blog li:last-child").addClass("last");
                jQuery(".list li:last-child").addClass("last");


                jQuery('.spinner').animate({'opacity': 0}, 1000, 'easeOutCubic', function() {
                    jQuery(this).css('display', 'none')
                });
            });

        </script>

        <!--[if lt IE 8]>
            <div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
        <![endif]-->
        <!--[if (gt IE 9)|!(IE)]><!-->
        <!--<![endif]-->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>    
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
      <![endif]-->
    </head>

    <body>
        <div class="spinner"></div>
        <!--============================== header =================================-->
        <header>
            <div class="container clearfix">
                <div class="row">
                    <div class="span12">
                        <div class="navbar navbar_">
                            <div class="container">
                                <h1 class="brand brand_"><a href="/"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.gif"> </a></h1>
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
                                <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="bg-content">       
            <!--============================== content =================================-->      
            <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
                <div class="container">
                    <div class="row">
                        <article class="span12">
                            <?php echo $content; ?>                              
                        </article>
                        
                    </div>
                </div>
            </div>
        </div>

        <!--============================== footer =================================-->
        <footer>
            <div class="container clearfix">
                <ul class="list-social pull-right">
                    <li><a class="icon-1" href="#"></a></li>
                    <li><a class="icon-2" href="#"></a></li>
                    <li><a class="icon-3" href="#"></a></li>
                    <li><a class="icon-4" href="#"></a></li>
                </ul>
                <div class="privacy pull-left">Website Template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">TemplateMonster.com</a> </div>
            </div>
        </footer>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>