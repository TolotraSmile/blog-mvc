<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 13:25
 */

namespace Core\Config;


class Config
{
    private $settings = [];

    private static $_instance;

    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public function get($key)
    {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
}