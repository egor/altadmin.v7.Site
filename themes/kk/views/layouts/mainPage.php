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
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/touchTouch.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/kwicks-slider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/alt.css" type="text/css" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.kwicks-1.5.1.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script>	  
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/touchTouch.jquery.js"></script>
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

                jQuery('.magnifier').touchTouch();
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
                                <h1 class="brand brand_"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.gif"> </h1>
                                <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
                                <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="span12"> 
                        <?php $this->widget('application.widgets.MainPage', array('method' => 'slider')); ?>
                        <span id="responsiveFlag"></span>
                        <div class="block-slogan">
                            <h2>Welcome!</h2>
                            <div>
                                <p><a href="http://blog.templatemonster.com/free-website-templates/ " target="_blank" class="link-1">Click here</a> for more info about this free website template created by TemplateMonster.com. This is a Bootstrap template that goes with several layout options (for desktop, tablet, smartphone landscape and portrait) to fit all popular screen resolutions. The PSD source files of this template are available for free for the registered members of TemplateMonster.com. Feel free to get them!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--============================== content =================================-->

            <div id="content" class="content-extra"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
                <div class="row-1">
                    <div class="container">
                        <div class="row">
                            <ul class="thumbnails thumbnails-1">
                                <li class="span3">
                                    <div class="thumbnail thumbnail-1">
                                        <h3>Fashion</h3>
                                        <img  src="<?php echo Yii::app()->theme->baseUrl; ?>/images/page1-img1.jpg" alt="">
                                        <section> <strong>At vero eos et accusamus et iusto </strong>
                                            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                                            <a href="#" class="btn btn-1">Read More</a> </section>
                                    </div>
                                </li>
                                <li class="span3">
                                    <div class="thumbnail thumbnail-1">
                                        <h3>Nature</h3>
                                        <img  src="<?php echo Yii::app()->theme->baseUrl; ?>/images/page1-img2.jpg" alt="">
                                        <section> <strong>Deleniti atque corrupti quos</strong>
                                            <p>Dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                                            <a href="#" class="btn btn-1">Read More</a> </section>
                                    </div>
                                </li>
                                <li class="span3">
                                    <div class="thumbnail thumbnail-1">
                                        <h3>Love story</h3>
                                        <img  src="<?php echo Yii::app()->theme->baseUrl; ?>/images/page1-img3.jpg" alt="">
                                        <section> <strong>Similique sunt in culpa qui officia </strong>
                                            <p>Deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                            <a href="#" class="btn btn-1">Read More</a> </section>
                                    </div>
                                </li>
                                <li class="span3">
                                    <div class="thumbnail thumbnail-1">
                                        <h3 class="title-1 extra">Fine art</h3>
                                        <img  src="/images/page1-img4.jpg" alt="">
                                        <section> <strong>Similique sunt in culpa qui officia</strong>
                                            <p>Deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                            <a href="#" class="btn btn-1">Read More</a> </section>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <article class="span12">
                            <h3><?php echo $this->pageHeader; ?></h3>
                            <?php echo $content; ?>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <!--============================== footer =================================-->
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
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
    </body>
</html>