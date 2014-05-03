<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'language' => 'ru',
    'theme' => 'default',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
        //altadmin CMS
        'altadmin',
        'altadmin.*',
        'news',
        
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'test',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
                //site
                'news/<url:[\w\-]+>' => 'news/default/detail',
                
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                
                '<modules:\w+>/<controller:\w+>/<id:\d+>' => '<modules>/<controller>/view',
                '<modules:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<modules>/<controller>/<action>',
                '<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',
                
                'altadmin/<modules:\w+>/<controller:\w+>/<id:\d+>' => 'altadmin/<modules>/<controller>/view',
                'altadmin/<modules:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => 'altadmin/<modules>/<controller>/<action>',
                'altadmin/<modules:\w+>/<controller:\w+>/<action:\w+>' => 'altadmin/<modules>/<controller>/<action>',
                                
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'egor.developer@gmail.com',
        
        'altadmin' => array(
            'systemPageUrl' =>array(
                'root' => 'horizontal_menu',
            ),
            'systemPageId' => array(
                'root'      =>  2,      //корневая страница
                '404'       =>  23,     //404 ошибка
                '403'       =>  24,     //403 ошибка
                'news'      =>  12,     //новости
                'contact'   =>  9,      //контакты
                'main'      =>  5,      //главная
                'blog'      =>  28,     //блог
                'sitemap'   =>  20,     //карта сайта
            ),
            
            //модули
            'modules' => array(
                'news' => array(
                    'work'          =>  1,  //вкл./выкл. новостей
                    'section'       =>  1,  //вкл./выкл. разделов в новостях
                    'tags'          =>  0,  //вкл./выкл. тегов в новостеях
                    'limit'         =>  10,  //количества записей на страницу в админке
                    'sectionLimit'  =>  10,  //количества разделов на страницу в админке
                    'image'     =>  array ( //настройки изображений
                        'list'  =>   array( //список изображений
                            'width'     =>  100,    //ширина изображения
                            'height'    =>  100)    //высота изображения
                        ),
                    'baseUrl'       =>  'news',
                ),
                'portfolio' => array(
                    'work'          =>  1,  //вкл./выкл. портфолио
                    'section'       =>  1,  //вкл./выкл. разделов в портфолио
                    'limit'         =>  10,  //количества записей на страницу в админке
                    'sectionLimit'  =>  10,  //количества разделов на страницу в админке
                    'image'     =>  array ( //настройки изображений
                        'list'  =>   array( //список изображений
                            'width'     =>  570,    //ширина изображения
                            'height'    =>  400,    //высота изображения
                            ),
                        'detail' => array(
                            'width'     =>  960,    //ширина большого изображения
                            'height'    =>  800,    //высота большого изображения
                        ),
                        ),
                ),
                'widget' => array(
                    'work'  => 1,
                    'feedback' => array (
                        'work'  =>  1,
                        'limit' =>  10,
                    ),
                ),
                'user' => array(
                    'work'      =>  1,
                    'limit'     =>  10,
                    'image'     =>  array(
                        'list'  =>  array(
                            'width'     =>  100,
                            'height'    =>  100,
                        ),
                    ),
                ),
            ),
        ),
	),
);