<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PHP', __DIR__);
define('PATH_PHP_LIB', PATH_PHP . DS . 'lib');
define('PATH_PHP_TEMPLATE', PATH_PHP . DS . 'template');
define('PATH_PHP_LOGS', PATH_PHP . DS . 'logs');
define('PATH_PHP_REST', PATH_PHP . DS . 'rest');
define('PATH_JS', __DIR__ . DS . '..' . DS . 'js');
define('PATH_JS_TEMPLATES', PATH_JS . DS . 'templates');
define('PATH_CSS', __DIR__ . DS . '..' . DS . 'css');

require PATH_PHP . DS . 'Rest.php';
require PATH_PHP . DS . 'RestProvider.php';
require PATH_PHP_LIB . DS . 'Log' . DS . 'Log.php';

class App
{
    private static $cssFiles = array();
    private static $jsFiles = array();
    private static $jsTemplatesFiles = array();
    private static $config = array(
        'bd_host' => 'localhost|mysql5-27.perso',
        'bd_login' => 'root|alexgaliddhelp',
        'bd_password' => '|ltslEee0',
        'bd_name' => 'alexgaliddhelp|alexgaliddhelp'
    );

    public static function init()
    {
        mb_internal_encoding("UTF-8");

        Log::logDir(PATH_PHP_LOGS);

        static::$cssFiles = array(
            'css/normalize.css',
            'css/base.css'
        );
        
        //JS
        static::$jsFiles = array(
            'js/lib/jquery-min.js',
            'js/lib/underscore-min.js',
            'js/lib/backbone-min.js',
            'js/vars.js'
        );
            //Models
        $jsModelsIterator = new FilesystemIterator(PATH_JS.DS.'models', FilesystemIterator::SKIP_DOTS);
        foreach($jsModelsIterator as $file) {
           static::$jsFiles[] = 'js/models/'.$file->getFilename();
        }
            //Collections
        $jsCollectionsIterator = new FilesystemIterator(PATH_JS.DS.'collections', FilesystemIterator::SKIP_DOTS);
        foreach($jsCollectionsIterator as $file) {
           static::$jsFiles[] = 'js/collections/'.$file->getFilename();
        }
            //Views
        $jsViewsIterator = new FilesystemIterator(PATH_JS.DS.'views', FilesystemIterator::SKIP_DOTS);
        foreach($jsViewsIterator as $file) {
           static::$jsFiles[] = 'js/views/'.$file->getFilename();
        }
            //App
        static::$jsFiles[] = 'js/app.js';

        //Templates
        $jsTemplatesIterator = new FilesystemIterator(PATH_JS_TEMPLATES, FilesystemIterator::SKIP_DOTS);
        foreach($jsTemplatesIterator as $file) {
            static::$jsTemplatesFiles[] = PATH_JS_TEMPLATES.DS.$file->getFilename();
        }
        
        //Init REST
        Rest::init();
    }

    public static function route()
    {
        if (key_exists('request', $_GET) && $_GET['request'] === 'rest') {
            Rest::route();
        } else {
            static::display();
        }
    }

    public static function css()
    {
        foreach (static::$cssFiles as $css) {
            echo '<link rel="stylesheet" href="' . $css . '">';
        }
    }

    public static function js()
    {
        foreach (static::$jsFiles as $js) {
            echo '<script src="' . $js . '"></script>';
        }
    }

    public static function jsTemplates()
    {
        foreach (static::$jsTemplatesFiles as $template) {
            include $template;
        }
    }

    public static function display()
    {
        ob_start();
        include PATH_PHP_TEMPLATE . DS . 'site.php';
        echo ob_get_clean();
    }

    public static function t($key, $option = null)
    {
        $value = static::i18nGet($key);
        if ($option == 'F') {
            $value = mb_strtoupper(mb_substr($value, 0, 1)).mb_substr($value, 1);
        } else if ($option == 'L') {
            $value = mb_strtolower($value);
        } else {
            $value = mb_strtoupper($value);
        }

        return $value;
    }

    public static function config($key)
    {
        $value = explode('|', static::$config[$key]);
        if (strpos($_SERVER['SERVER_NAME'], 'localhost') === false) {
            return $value[1];
        } else {
            return $value[0];
        }
    }

    private static function i18nGet($key)
    {
        return $key;
    }

}
