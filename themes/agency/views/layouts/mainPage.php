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
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/js/google-code-prettify/prettify.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
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
<div class="jumbotron masthead">
  <div class="splash"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home-banner-bg.jpg" alt="Banner" /> </div>
  <div class="splash"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home-banner-bg2.jpg" alt="Banner" /> </div>
  <div class="splash"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home-banner-bg3.jpg" alt="Banner" /> </div>
  <div class="nav-agency">
    <div class="navbar navbar-static-top"> 
      <!-- navbar-fixed-top -->
      <div class="navbar-inner">
        <div class="container"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Logo.png" alt="Logo">
          <?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>            
        </div>
      </div>
    </div>
  </div>
  <div class="container show-case-item">
    <h1> ENGAGE & INNOVATE, OR DIE<br />
      (555) 111-0000 </h1>
    <p> Gone are the days of building simple websites. Clients are demanding more functionality
      and better results from their websites and we create unforgettable brand experiences.
      Our passion is helping design and build solutions that strike the perfect balance
      between users, business, and technology.</p>
    <a href="work.html" class="bigbtn">View Our Work</a>
    <div class="clearfix"> </div>
  </div>
  <div class="container show-case-item">
    <h1> SIMPLICITY IS A GOOD THING<br />
      ADOPT! </h1>
    <p> Gone are the days of building simple websites. Clients are demanding more functionality
      and better results from their websites and we create unforgettable brand experiences.
      Our passion is helping design and build solutions that strike the perfect balance
      between users, business, and technology.</p>
    <a href="work.html" class="bigbtn">View Our Work</a>
    <div class="clearfix"> </div>
  </div>
  <div class="container show-case-item">
    <h1> PLAN, BUILD, LAUNCH<br />
      & GROW! </h1>
    <p> Gone are the days of building simple websites. Clients are demanding more functionality
      and better results from their websites and we create unforgettable brand experiences.
      Our passion is helping design and build solutions that strike the perfect balance
      between users, business, and technology.</p>
    <a href="work.html" class="bigbtn">View Our Work</a>
    <div class="clearfix"> </div>
  </div>
  <div id="banner-pagination">
    <ul>
      <li><a href="#" class="active" rel="0"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot-active.png" alt="" /></a></li>
      <li><a href="#" rel="1"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot.png" alt="" /></a></li>
      <li><a href="#" rel="2"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot.png" alt="" /></a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="marketing">
    <h1><?php echo $this->pageHeader; ?></h1>
    <hr class="soften">
    <div class="row textleft"><?php echo $content; ?></div>
    
    <hr class="soften">
  
  </div>
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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/google-code-prettify/prettify.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-button.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/application.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js" type="text/javascript"></script> 
<script type="text/javascript">
        $(document).ready(function () {

            var showCaseItems = $('.show-case-item').hide();

            var splashes = $('.splash').hide();
            //get each image for each slide and set it as a background of the slide
            //            splashes.each(function () {
            //                var img = $(this).find('img');
            //                var imgSrc = img.attr('src');
            //                img.css('visibility', 'hidden');
            //                $(this).css({ 'background-image': 'url(' + imgSrc + ')', 'background-repeat': 'no-repeat' });
            //            });

            splashes.eq(0).show();
            showCaseItems.eq(0).show();

            var prevIndex = -1;
            var nextIndex = 0;
            var currentIndex = 0;

            $('#banner-pagination li a').click(function () {

                nextIndex = parseInt($(this).attr('rel'));

                if (nextIndex != currentIndex) {
                    $('#banner-pagination li a').html('<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot.png" alt="slide"/>');
                    $(this).html('<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot-active.png" alt="slide"/>');
                    currentIndex = nextIndex;
                    if (prevIndex < 0) prevIndex = 0;

                    splashes.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 500, function () {
                        $(this).hide();
                    });
                    splashes.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 500, function () { });

                    showCaseItems.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 500, function () {
                        $(this).hide();
                        showCaseItems.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 200, function () { });
                    });

                    prevIndex = nextIndex;
                }

                return false;
            });

        });
    </script>
</body>
</html>
