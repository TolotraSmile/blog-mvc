<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 11:09
 */

namespace Core\Table;

use Core\Database\IDatabase;

class Table
{
    protected $table;
    protected $database;

    public function __construct($db)
    {
        $this->database = $db;
        if ($this->table === null) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function query($statement, $attributes = null, $one = false)
    {
        $class = str_replace('Table', 'Entity', get_called_class());
        return $attributes
            ? $this->database->prepare($statement, $attributes, $class, $one)
            : $this->database->query($statement, $class, $one);
    }

    public function all()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM " . $this->table . " WHERE id = ?", [$id], true);
    }

}