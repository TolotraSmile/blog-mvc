<?php


namespace App\Table;

use Core\Table\Table;

/**
 * Created by PhpStorm.
 * User: RAHARISON
 * Date: 22/04/2016
 * Time: 07:58
 */
class ArticlesTable extends Table
{
    function __construct($db)
    {
        parent::__construct($db);
    }

    public function getLast()
    {
        return $this->query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie FROM " . $this->table .
            " LEFT JOIN categories ON articles.category_id=categories.id ORDER BY articles.titre");
    }

    public function lastByCategory($category_id)
    {
        return $this->query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie FROM " . $this->table .
            " LEFT JOIN categories ON articles.category_id=categories.id WHERE articles.category_id=?", [$category_id]);
    }

    public function find($id)
    {
        $statement = "SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie FROM " . $this->table .
            " LEFT JOIN categories ON articles.category_id=categories.id WHERE articles.id=?";
        $data = $this->query($statement, [$id], true);
        return $data;
    }
}