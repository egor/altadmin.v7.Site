<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->pageTitle; ?> | ALTADMIN</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" />

        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/ace.min.css" />
        <!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/ace.css" />-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/ace-ie.min.css" />
        <![endif]-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" />
        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <?php if (Yii::app()->controller->id != 'page') { ?>
            <!--[if !IE]>-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <!--<![endif]-->
        <?php } ?>
    <body>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="#" class="brand">
                        <small>
                            <i class="icon-star"></i>
                            Alt Admin
                        </small>
                    </a><!--/.brand-->

                    <ul class="nav ace-nav pull-right">
                        <li class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-tasks"></i>
                                <span class="badge badge-grey">4</span>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                                <li class="nav-header">
                                    <i class="icon-ok"></i>
                                    4 Tasks to complete
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:65%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini progress-danger">
                                            <div style="width:35%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini progress-warning">
                                            <div style="width:15%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-success progress-striped active">
                                            <div style="width:90%" class="bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        See tasks with details
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="purple">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-bell-alt icon-animated-bell"></i>
                                <span class="badge badge-important">8</span>
                            </a>

                            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
                                <li class="nav-header">
                                    <i class="icon-warning-sign"></i>
                                    8 Notifications
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-pink icon-comment"></i>
                                                New Comments
                                            </span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-mini btn-primary icon-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
                                                New Orders
                                            </span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-mini no-hover btn-info icon-twitter"></i>
                                                Followers
                                            </span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        See all notifications
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php $this->widget('application.modules.altadmin.widgets.Feedback', array('method' => 'feedbackNotification')); ?>
                        <?php $this->widget('application.modules.altadmin.widgets.UserMenu'); ?>
                        
                    </ul><!--/.ace-nav-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-small btn-success">
                            <i class="icon-signal"></i>
                        </button>

                        <button class="btn btn-small btn-info">
                            <i class="icon-pencil"></i>
                        </button>

                        <button class="btn btn-small btn-warning">
                            <i class="icon-group"></i>
                        </button>

                        <button class="btn btn-small btn-danger">
                            <i class="icon-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!--#sidebar-shortcuts-->
                <?php $this->widget('application.modules.altadmin.widgets.NavigationMenu'); ?>


                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <?php
                    if ($this->breadcrumbs) {
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'htmlOptions' => array('class' => 'breadcrumb'),
                            'separator' => '<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>',
                            'tagName' => 'ul',
                            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                            'homeLink' => '<li><i class="icon-home home-icon"></i><a href="' . Yii::app()->createUrl('altadmin') . '">Alt Admin</a></li>',
                            'links' => $this->breadcrumbs
                        ));
                    }
                    ?>

                    <div class="nav-search" id="nav-search">
                        <form class="form-search" />
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
                            <i class="icon-search nav-search-icon"></i>
                        </span>
                        </form>
                    </div><!--#nav-search-->
                </div>

                <div class="page-content">


                    <div class="page-header position-relative">
                        <h1>
                            <?php
                            echo $this->pageHeader;
                            if ($this->pageAddHeader) {
                                echo '<small><i class="icon-double-angle-right"></i>' . $this->pageAddHeader . '</small>';
                            }
                            ?>                           
                        </h1>
                    </div><!--/.page-header-->
                    <div class="row-fluid">
                        <div class="span12">
                            <?php $this->widget('application.modules.altadmin.widgets.ShowNotifications'); ?>
                            <div id="CMSContent"><?php echo $content; ?></div>
                        </div>
                    </div>
                </div><!--/.page-content-->

                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="icon-cog bigger-150"></i>
                    </div>

                    <div class="ace-settings-box" id="ace-settings-box">
                        <div>
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-class="default" value="#438EB9" />#438EB9
                                    <option data-class="skin-1" value="#222A2D" />#222A2D
                                    <option data-class="skin-2" value="#C6487E" />#C6487E
                                    <option data-class="skin-3" value="#D0D0D0" />#D0D0D0
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <div>
                            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
                            <label class="lbl" for="ace-settings-header"> Fixed Header</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>
                    </div>
                </div><!--/#ace-settings-container-->
            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>

        <!--basic scripts-->

        <?php if (Yii::app()->controller->id != 'page') { ?>
            <!--[if !IE]>-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <!--<![endif]-->
        <?php } ?>                    

        <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/bootstrap.min.js"></script>

        <!--page specific plugin scripts-->
        <!--[if lte IE 8]>
                  <script src="assets/js/excanvas.min.js"></script>
                <![endif]-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.slimscroll.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.easy-pie-chart.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.sparkline.min.js"></script>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/flot/jquery.flot.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/flot/jquery.flot.pie.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/flot/jquery.flot.resize.min.js"></script>-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/date-time/bootstrap-datepicker.min.js"></script>

        <!--ace scripts-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/ace-elements.min.js"></script>
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/ace.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/ace.js"></script>
        <script type="text/javascript">
            $(function() {

                $('.date-picker').datepicker().next().on(ace.click_event, function() {
                    $(this).prev().focus();
                });
            });
        </script>
        <!--inline scripts related to this page-->
    </body>
</html>