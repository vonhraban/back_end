<?php

// define a path alias
Yii::setPathOfAlias('front_end',  '../InfiniteLoop/protected/');
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'front_end.models.base.*',
        'front_end.models.form.',
        'front_end.models.behavior.*',
        'application.models.*',
        'application.models.forms.*',
        'application.components.*',
        'application.extensions.giix-components.*', // giix components
    ),
    'components' => array(
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=infiniteloop',
            'emulatePrepare' => true,
            'username' => 'infiniteloop',
            'password' => 'ideiglenes',
            'charset' => 'utf8',
        ),
    ),
    'params' => include dirname(__FILE__) . '/params.php',
);