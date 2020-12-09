<?php

use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
//var_dump($categorie);

$articles = Article::lastByCategory($_GET['id']);
//var_dump($articles);

?>r