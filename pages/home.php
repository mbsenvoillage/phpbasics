

<div class="row">
    <div class="col-sm-8">
        <?php foreach (\App\Table\Article::getLast() as $post) :?>

            <h2>
                <a href="<?= $post->getUrl(); ?>"><?= $post->articles_titre ?></a>
            </h2>

            <p><em><?= ucfirst($post->categories_titre); ?></em></p>
            <p><?= $post->extrait; ?></p>



        <?php endforeach;?>

    </div>
    <div class="col-sm-4">
        <ul>
        <?php foreach (\App\Table\Categorie::all() as $categorie) : ?>
            <?php $categorie->url?>

            <li><a href="<?= $categorie->url; ?>"><?= $categorie->categories_titre; ?></a></li>

        <?php endforeach; ?>
        </ul>
    </div>
</div>

