<?php
/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 10:46
 */

namespace App\Table;

use Core\Table\Table;

class CategoriesTable extends Table
{
    public function getUrl()
    {
        return 'index.php?p=categorie&id=' . $this->id;
    }
}