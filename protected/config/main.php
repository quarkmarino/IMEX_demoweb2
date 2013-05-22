<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Instituto México',
    'theme' => 'classic',
    'sourceLanguage' => 'en',
    'language' => 'es',
    // preloading 'log' component
//	'onBeginRequest' => create_function('$event', 'return ob_start("ob_gzhandler");'),
//	'onEndRequest' => create_function('$event', 'return ob_end_flush();'),
    'preload' => array(
        'log','bootstrap'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.giix-components.*',
    	'ext.fileimagebehavior.*',
    	'application.extensions.mbmenu.*',
    	'ext.galleryManager.models.*',
    	'ext.galleryManager.*',
    	'ext.editable.*',
        'ext.yii-mail.YiiMailMessage',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'ext.bootstrap.gii',
            ),
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin'
    ),
    // application components
    'components' => array(
    	'cache'=>array(
    		'class'=>'system.caching.CApcCache',
    	),
    	'file'=>array(
    		'class'=>'application.extensions.file.CFile',
    	),
    	'bootstrap' => array(
    		'class' => 'ext.bootstrap.components.Bootstrap',
    		'coreCss' => true,
    		'responsiveCss' => true,
    	),
		'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl'=>array('login/login'),
        ),
        'widgetFactory' => array(
        		'class' => 'CWidgetFactory',
        		'widgets' => array(
        				'TinyMce'=>array(
        						'compressorRoute' => 'admin/tinyMce/compressor',
        						'spellcheckerRoute' => 'admin/tinyMce/spellchecker',
        						'fileManager' => array(
        								'class' => 'ext.elFinder.TinyMceElFinder',
        								'connectorRoute'=>'admin/elfinder/connector',
        						)
        				),
        				//                'TinyMce' => array(
        				//                    'compressorRoute' => 'admin/tinyMce/compressor',
        				//                    'spellcheckerRoute' => 'admin/tinyMce/spellchecker',
        				//                    'fileManager' => array(
        				//                        'class' => 'ext.elFinder.TinyMceElFinder',
        				//                        'connectorRoute'=>'admin/elfinder/connector',
        				//                    )
        				//                ),
        				'GalleryManager'=>array(
        						'controllerRoute' => 'admin/gallery',
        				) ,
        				'ServerFileInput'=>array(
        						'connectorRoute' => 'admin/elfinder/connector',
        				),
        				'ElFinderWidget' => array(
        						'connectorRoute'=>'admin/elfinder/connector',
        				),
        		)
        ),
        'image'=>array(
        		'class' => 'application.extensions.image.CImageComponent',
        		// GD or ImageMagick
        		'driver' => 'GD',
        		// ImageMagick setup path
        		'params' => array('directory' => '/opt/local/bin'),
        ),
/*        
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'login'=>'login/login',
			),
		),
*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=modeloed_pagweb',
			'emulatePrepare' => true,
			'username' => 'modeloed_sisweb',
			'password' => 'fg5t6-sa',
			'charset' => 'utf8',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
		),
        
            'mail' => array(
                    'class' => 'application.extensions.yii-mail.YiiMail',
                    'transportType'=>'smtp', /// case sensitive!
                    'transportOptions'=>array(
                        'host'=>'mail.imex.edu.mx',
                        'username'=>'sist@imex.edu.mx',
                        'password'=>'ge-ma3b',
                        'port'=>'25',
                    ),
                    'viewPath' => 'application.views.mail',
                    'logging' => true,
                    'dryRun' => false,
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
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            
                //array( 'class'=>'CWebLogRoute', ),
             
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
		// this is used in contact page
            'adminEmail'=>'sist@imex.edu.mx',
            'fromEmail' => 'Plataforma IMEX',
        /*    'emailsNotificacionBoletines'=>array(
                'robeneg@hotmail.com',
//                'luzhilda.lopez.es@imex.edu.mx',
//                'antonio.espinosa.es@imex.edu.mx',
//                'antonio.cabo.es@imex.edu.mx',
                'acv_imex@hotmail.com',
                'oswaldo@globaloxs.com',
               	'anpadilla@globaloxs.com',
                'matus00@globaloxs.com',
                'oscar.vasquez@globaloxs.com',
                'robeneg@gmail.com',
                'edgar.benitez.es@imex.edu.mx',
                'teresa.sanchez.es@imex.edu.mx',
                'asistenteprimaria@gmail.com',
                'luzmaria.castillo@imex.edu.mx'
            ), */
            'estrellasAdminEmail' => 'admisiones.es@imex.edu.mx',
            'sanPedroAdminEmail' => 'admisiones.csp@imex.edu.mx',
            'facebook_link' => 'http://www.facebook.com/',
            'twitter_link' => 'http://www.twitter.com/',
            'url'=>'http://www.modeloeducativosimex.com'
	),
);