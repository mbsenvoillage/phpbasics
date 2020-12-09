<?php

$post = \App\App::getDb()->prepare('select * from articles where articles_id = ?', [$_GET['id']], 'App\Table\Article', true);

?>

<h2><?= $post->articles_titre; ?></h2>

<p><?= $post->contenu; ?></p>

