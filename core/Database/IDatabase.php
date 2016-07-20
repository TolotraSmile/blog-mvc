<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 07:34
 */

namespace Core\Database;

interface IDatabase
{
    function query($statement, $class_name = null, $one = false);

    function prepare($statement, array $attributes, $class_name = null, $one = false);
}