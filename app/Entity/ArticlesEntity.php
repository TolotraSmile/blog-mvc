<?php


namespace App\Table;
use Core\Entity\Entity;

/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 07:58
 */

class ArticlesEntity extends Entity
{
    protected static $table = 'articles';  public $name = "LAOLINA";

    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . $this->contenu . '</p>';
        $html .= '<a href="' . $this->getUrl() . '">Voir plus...</a>';
        return $html;
    }

}