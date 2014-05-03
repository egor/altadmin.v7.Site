<!DOCTYPE html>
<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Curve - Free CSS template by ChocoTemplates.com</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/flexslider.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/alt.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css' />
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/functions.js" type="text/javascript"></script>
</head>
<body>
	<!-- wraper -->
	<div id="wrapper">
		<!-- shell -->
		<div class="shell">
			<!-- container -->
			<div class="container">
				<!-- header -->
				<header id="header">
					<h1 id="logo"><a href="#">Curve</a></h1>
					<!-- search -->
					<div class="search">
						<form method="post">
							<span class="field"><input type="text" class="field" value="keywords here ..." title="keywords here ..." /></span>
							<input type="submit" class="search-btn" value="" />
						</form>
					</div>
					<!-- end of search -->
				</header>
				<!-- end of header -->
				<?php $this->widget('application.widgets.Menu', array('method' => 'horizontalMenu')); ?>        
				<!-- main -->
                
				<div class="main">
                        <h1 class="alt-h1"><?php echo $this->pageHeader; ?></h1>
                        <?php echo $content; ?>                        																				
				</div>
				<!-- end of main -->
				<div class="socials">
					<div class="socials-inner">
						<h3>Follow us</h3>
						<ul>
							<li><a href="#" class="facebook-ico"><span></span>Facebook</a></li>
							<li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
							<li><a href="#" class="rss-feed-ico"><span></span>Rss-feed</a></li>
							<li><a href="#" class="myspace-ico"><span></span>myspace</a></li>
							<li><a href="#" class="john-doe-123-ico"><span></span>Skype</a></li>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<div id="footer">
					<div class="footer-cols">
						<div class="col">
							<h2>Services</h2>
							<ul>
								<li><a href="#">Web Design</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">Seo Optimization</a></li>
								<li><a href="#">Mobile App Development</a></li>
							</ul>
						</div>
						<div class="col">
							<h2>Projects</h2>
							<ul>
								<li><a href="#">Lorem ipsum dolor </a></li>
								<li><a href="#">Consectetuer adipiscing</a></li>
								<li><a href="#">Proin sed odio et ante </a></li>
								<li><a href="#">Mazim sensibus et usu</a></li>
							</ul>
						</div>
						<div class="col">
							<h2>Solutions</h2>
							<ul>
								<li><a href="#">Lorem ipsum dolor</a></li>
								<li><a href="#">Consectetuer adipiscing</a></li>
								<li><a href="#">Proin sed odio et ante </a></li>
								<li><a href="#">Mazim sensibus et usu</a></li>
							</ul>
						</div>
						<div class="col">
							<h2>Partners</h2>
							<ul>
								<li><a href="#">Company Name 1</a></li>
								<li><a href="#">Company Name 2</a></li>
								<li><a href="#">Company Name 3</a></li>
								<li><a href="#">Company Name 4</a></li>
							</ul>
						</div>
						<div class="cl">&nbsp;</div>
					</div>
					<!-- end of footer-cols -->
					<div class="footer-bottom">
                        <?php $this->widget('application.widgets.Menu', array('method' => 'footerMenu')); ?>        						
						<p class="copy">&copy; Copyright 2012 - <?php echo date('Y'); ?> ALT Site <span>|</span> <strong>Design by <a href="http://alt.dp.ua" target="_blank">alt.dp.ua</a></strong></p>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			<!-- end of container -->	
		</div>
		<!-- end of shell -->	
	</div>
	<!-- end of wrapper -->
</body>
</html>