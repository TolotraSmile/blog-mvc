<?php
use Core\Database\MySQLDatabase;

/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 10:11
 */
class App
{
    const DB_NAME = 'blog';
    const DB_HOST = '127.0.0.1';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

    /**
     * @var MySQLDatabase
     */
    private $database;

    private static $title;

    /**
     * @return string
     */
    public static function getTitle()
    {
        return self::$title;
    }

    /**
     * @param string $title
     */
    public static function setTitle($title)
    {
        self::$title = $title;
    }

    private static $_instance;


    /**
     * App constructor.
     */
    public function __construct()
    {
        $db_config = array(
            'db_name' => self::DB_NAME,
            'db_user' => self::DB_USER,
            'db_password' => self::DB_PASSWORD,
            'db_host' => self::DB_HOST
        );

        $this->database = new MySQLDatabase($db_config);
    }

    /**
     * @return App
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->database);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getDB()
    {
        return $this->database;
    }

    /**
     * 404 Error
     */
    public static function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        header('location:index.php?p=404');
    }

    /**
     * Load the application session and autoloader
     */
    public static function load()
    {
        session_start();
        require '../core/Config/Autoloader.php';
        \Core\Config\Autoloader::register();
    }

    public static function debug($variable)
    {
        echo '<pre>' . print_r($variable, true) . '</pre>';
    }
}