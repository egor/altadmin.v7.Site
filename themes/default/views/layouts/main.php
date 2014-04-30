<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="ru-Ru"> <!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo $this->pageTitle; ?></title>   

<meta name="description" content="Insert Your Site Description" /> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<!-- Bootstrap -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" rel="stylesheet">

<!-- Supersized -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/supersized.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css" rel="stylesheet">

<!-- Supersized -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/supersized.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/supersized.shutter.css" rel="stylesheet">

<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- Modernizr -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.js"></script>

<!-- Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'Insert Your Code']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- End Analytics -->

</head>


<body>

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">	
    <div class="overlay"></div>

    <div class="slider-text">
    	<div id="slidecaption"></div>
    </div>   
	
	<div class="control-nav">
        <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
        <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
        <ul id="slide-list"></ul>
        
        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="#home-slider" title="Brushed | Responsive One Page Template">Brushed Template</a>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="#home-slider">главная</a></li>
                <li><a href="#work">портфолио</a></li>
                <li><a href="#about">о нас</a></li>
                <li><a href="#contact">контакты</a></li>
				<li><a href="shortcodes.html" class="external">Shortcodes</a></li>
            </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->

     <?php $this->widget('application.widgets.MainPage', array('method' => 'portfolio')); ?>        
        
<!-- About Section -->
<div id="about" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">О нас</h2>
                <h3 class="title-description">Learn About our Team &amp; Culture.</h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- People -->
    <div class="row">
    	
        <!-- Start Profile -->
    	<div class="span4 profile">
        	<div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <span class="overlay-text-thumb">CTO/Founder</span>
                </div>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile/profile-01.jpg" alt="John Doe">
            </div>
            <h3 class="profile-name">John Doe</h3>
            <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat <a href="#">hendrerit dictum</a>. 
            Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
            	
            <div class="social">
            	<ul class="social-icons">
                	<li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-dribbble"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-facebook"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
    	<div class="span4 profile">
        	<div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <span class="overlay-text-thumb">Creative Director</span>
                </div>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile/profile-02.jpg" alt="Jane Helf">
            </div>
            <h3 class="profile-name">Jane Helf</h3>
            <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat <a href="#">hendrerit dictum</a>. 
            Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
            	
            <div class="social">
            	<ul class="social-icons">
                	<li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-email"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
    	<div class="span4 profile">
        	<div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <span class="overlay-text-thumb">Lead Designer</span>
                </div>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile/profile-03.jpg" alt="Joshua Insanus">
            </div>
            <h3 class="profile-name">Joshua Insanus</h3>
            <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat <a href="#">hendrerit dictum</a>. 
            Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
            	
            <div class="social">
            	<ul class="social-icons">
                	<li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-linkedin"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-google-plus"></i></a></li>
                    <li><a href="#"><i class="font-icon-social-vimeo"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End Profile -->
        
    </div>
    <!-- End People -->
</div>
</div>
<!-- End About Section -->


<!-- Contact Section -->
<div id="contact" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">Обратная связь</h2>
                <h3 class="title-description">В настоящее время мы принимать новые клиентские проекты. Мы с нетерпением ждем сотрудничества с Вами.</h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Contact Form -->
    <div class="row">
    	<div class="span9">        
        	<?php $this->widget('application.widgets.Feedback'); ?>
        </div>
        
        <div class="span3">
        	<div class="contact-details">
        		<h3>Контакты</h3>
                <ul>
                    <li><a href="mailto:info@alt.dp.ua">info@alt.dp.ua</a></li>
                    <li>(050) 93-4444-7</li>                    
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->
</div>
</div>
<!-- End Contact Section -->

<!-- Twitter Feed -->
<div id="twitter-feed" class="page-alternate">
	<div class="container">
    	<div class="row">
            <div class="span12">
                <div class="follow">
                    <a href="https://twitter.com/Bluxart" title="Follow Me on Twitter" target="_blank"><i class="font-icon-social-twitter"></i></a>
                </div>
                    
                <div id="ticker" class="query"> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Twitter Feed -->

<!-- Socialize -->
<div id="social-area" class="page">
	<div class="container">
    	<div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com/Bluxart" title="Follow Me on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="http://dribbble.com/Bluxart" title="Follow Me on Dribbble" target="_blank"><span class="font-icon-social-dribbble"></span></a></li>
                        <li><a href="http://forrst.com/people/Bluxart" title="Follow Me on Forrst" target="_blank"><span class="font-icon-social-forrst"></span></a></li>
                        <li><a href="http://www.behance.net/alessioatzeni" title="Follow Me on Behance" target="_blank"><span class="font-icon-social-behance"></span></a></li>
                        <li><a href="https://www.facebook.com/Bluxart" title="Follow Me on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://plus.google.com/105500420878314068694" title="Follow Me on Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a></li>
                        <li><a href="http://www.linkedin.com/in/alessioatzeni" title="Follow Me on LinkedIn" target="_blank"><span class="font-icon-social-linkedin"></span></a></li>
                        <li><a href="http://themeforest.net/user/Bluxart" title="Follow Me on ThemeForest" target="_blank"><span class="font-icon-social-envato"></span></a></li>
                        <li><a href="http://zerply.com/Bluxart/public" title="Follow Me on Zerply" target="_blank"><span class="font-icon-social-zerply"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->

<!-- Footer -->
<footer>
	<p class="credits">&copy;2013 ALT. Все права защищены</p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->


<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/waypoints.js"></script> <!-- WayPoints -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->

</body>
</html>