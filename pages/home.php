<div class="col-sm-8">
    <?php $article = new \App\Table\ArticlesTable(App::getInstance()->getDB()); ?>
    <?php foreach ($article as $post): ?>
    <h2><?= $post->titre ?></h2>
    <h4 style="color: dimgrey;"><?= $post->categorie ?></h4>
    <p><?= $post->extrait; ?></p>
    <?php endforeach ?>
</div>
<div class="col-sm-4">
    <ul>
        <?php $categorie = new \App\Table\CategoriesTable(App::getInstance()->getDB()); ?>
        <?php foreach ($categorie->all() as $categorie): ?>
        <li>
            <a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
        </li>
        <?php endforeach ?>
    </ul>
</div>