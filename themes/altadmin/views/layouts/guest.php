<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $this->pageTitle; ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">

</head>

<body>


    <?php echo $content; ?>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sb-admin.js"></script>

</body>

</html>