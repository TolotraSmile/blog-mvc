<?php
use App\App;

$categorie = \App\Table\CategorieTable::find($_GET['id']);
$articles = \App\Table\ArticleTable::lastByCategory($_GET['id']);
$categories = \App\Table\CategorieTable::all();

if ($categorie === false) {
    App::notFound();
}

?>

<h1><?= $categorie->titre; ?></h1>

<div class="col-sm-8">
    <?php foreach ($articles as $post): ?>
        <h2><?= $post->titre ?></h2>
        <h4 style="color: dimgrey;"><?= $post->categorie ?></h4>
        <p><?= $post->extrait; ?></p>
    <?php endforeach ?>
</div>
<div class="col-sm-4">
    <ul>
        <?php foreach ($categories as $categorie): ?>
            <li>
                <a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
