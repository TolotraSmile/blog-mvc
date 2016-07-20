<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 07:34
 */

namespace Core\Database;

use \PDO;

class MySQLDatabase implements IDatabase
{
    /**
     * @var string Database PDO connection
     */
    private $pdo;

    public function __construct(array $config = array('db_name' => 'blog', 'db_user' => 'root', 'db_password' => 'root', 'db_host' => 'localhost'))
    {
       $this->pdo = new PDO('mysql:dbname=' . $config['db_name'] . ';host=' . $config['db_host'] . ';charset=utf8', $config['db_user'], $config['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param $statement
     * @param null $class_name
     * @param bool $one
     * @return array|mixed
     */
    public function query($statement, $class_name = null, $one = false)
    {
        $request = $this->pdo->query($statement);
        if ($class_name === null) {
            $request->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $request->setFetchMode(PDO::FETCH_CLASS, $class_name, null);
        }
        return $one ? $request->fetch() : $request->fetchAll();
    }

    /**
     * @param $statement
     * @param $attributes
     * @param null $class_name
     * @param bool $one
     * @return array|mixed
     */
    public function prepare($statement, array $attributes, $class_name = null, $one = false)
    {
        $request = $this->pdo->prepare($statement);
        $request->execute($attributes);

        if ($class_name === null) {
            $request->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $request->setFetchMode(PDO::FETCH_CLASS, $class_name, null);
        }

        return $one ? $request->fetch() : $request->fetchAll();
    }
}