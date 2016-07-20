<div class="col-sm-8">
    <?php $post = \App\Table\ArticleTable::find($_GET['id']); ?>
    <?php if ($post === false) \App\App::notFound(); ?>
    <h2><?= $post->titre ?></h2>
    <h4 style="color: dimgrey;"><?= $post->categorie ?></h4>
    <p><?= $post->extrait; ?></p>
</div>