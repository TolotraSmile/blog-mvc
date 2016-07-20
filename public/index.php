<?php

/**
 * Initialisation des objets
 * */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../app/App.php';
App::load();
$p = isset($_GET['p']) ? $_GET['p'] : 'home';

ob_start();

switch ($p) {
    case 'home':
        require '../pages/home.php';
        break;

    case 'article':
        //require '../pages/article.php';
        break;

    case 'categorie':
        //require '../pages/categorie.php';
        break;

    case '404':
        //require '../pages/templates/404.php';
        break;
}

$content = ob_get_clean();
require '../pages/templates/default.php';

?>