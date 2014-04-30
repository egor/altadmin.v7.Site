<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

//Подключение файла настроек в зависимости от сервера
if($_SERVER['SERVER_ADDR']=='127.0.0.1' && $_SERVER['HTTP_HOST']!='alt.dp.ua'){
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
    $config=dirname(__FILE__).'/protected/config/mainLocal.php';
} else {
    $config=dirname(__FILE__).'/protected/config/mainServer.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
