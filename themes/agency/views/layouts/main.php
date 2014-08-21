<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/docs.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/js/google-code-prettify/prettify.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
            ================================================== -->
        <div class="nav-agency">
            <div class="navbar navbar-static-top"> 
                <!-- navbar-fixed-top -->
                <div class="navbar-inner">
                    <div class="container"> <a class="brand" href="/"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Logodark.png" alt="Logo"></a>
                        <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php echo $content; ?>
        </div>
        <!-- Footer
            ================================================== -->
        <footer class="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span3">
                        <h4>Navigation</h4>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Work</a></li>
                            <li><a href="#">Elements</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="span3 MT70">
                        <h4>Useful Links</h4>
                        <ul class="footer-links">
                            <li><a href="#">eGrappler.com</a></li>
                            <li><a href="#">Greepit.com</a></li>
                            <li><a href="#">WordPress.com</a></li>
                            <li><a href="#">ThemeForest.net</a></li>
                            <li><a href="#">Free Vector Icons</a></li>
                        </ul>
                    </div>
                    <div class="span3 MT70">
                        <h4>Something from Flickr</h4>
                        <div id="flickr-wrapper"> 
                            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=10133335@N08"></script> 
                        </div>
                    </div>
                    <div class="span3 MT70">
                        <h4>Who We Are</h4>
                        <p>We are a creative production studio specialising in all things digital. Find us, connect & collaborate.</p>
                        <ul class="footer_social clearfix">
                            <li><a href="#" class="footer_facebook">Facebook</a></li>
                            <li><a href="#" class="footer_twitter">Twitter</a></li>
                            <li><a href="#" class="footer_googleplus">Google+</a></li>
                            <li><a href="#" class="footer_rss">RSS</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="soften1 copyhr">
                <div class="row-fluid copyright">
                    <div class="span12">Copyright &copy; 2012. Greepit.com</div>
                </div>
            </div>
        </footer>
        <!-- Le javascript
            ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/google-code-prettify/prettify.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-transition.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-alert.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-modal.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-dropdown.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-scrollspy.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tab.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tooltip.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-popover.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-button.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-collapse.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-carousel.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-typeahead.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-affix.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/application.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/contact.js" type="text/javascript"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js" type="text/javascript"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js" type="text/javascript"></script>
    </body>
</html>