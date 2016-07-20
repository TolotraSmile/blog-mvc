<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 14:54
 */

namespace Core\Entity;


class Entity
{

    public $name = "LAOLINA";
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

}