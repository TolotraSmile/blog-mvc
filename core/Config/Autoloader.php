<?php

namespace Core\Config;
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 21/04/2016
 * Time: 20:05
 */

class Autoloader
{
    /**
     * @param $class
     */
    static public function autoload($class)
    {
        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $class . '.php';
        if (is_file($file)) {
            require($file);
        }
    }

    static public function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }
}