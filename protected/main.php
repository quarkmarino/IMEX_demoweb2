<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Aplicacion Web',
    'theme' => 'classic',
    'sourceLanguage' => 'es',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array(
        'log',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.giix-components.*',
    	'ext.fileimagebehavior.*'
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
    ),
    // application components
    'components' => array(
           'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /*
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        
        
        'db' => array(
            'connectionString' => 'sqlsrv:Server=192.168.1.90\GLOBALOXS; Database=mesacont_farmatodo;MultipleActiveResultSets=false',
//			'connectionString' => 'sqlsrv:Server=192.168.100.249\SQLEXPRESS; Database=mesacont_farmatodo;MultipleActiveResultSets=false',            
//      	'connectionString' => 'sqlsrv:Server=PC64\DESARROLLO; Database=mesacont_farmatodo;MultipleActiveResultSets=false',
            'username' => 'sa',
            'password' => 'globaloxs',
        ),
        */
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);