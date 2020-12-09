<?php

namespace  App\Table;

use App\App;
class Article extends Table
{


    public static function getLast() {
        // __CLASS__ returns the current class name ($this)
        //return App::getDb()->query('select * from articles', __CLASS__);
        return App::getDb()->query('select articles_id, articles_titre, contenu, categories_titre from articles left join categories c on c.categories_id = articles.cat_id', __CLASS__);
    }

    public static function lastByCategory($category_id) {
        return App::getDb()->prepare(
            'select articles_id, articles_titre, contenu, categories_titre from articles 
            left join categories c on c.categories_id = articles.cat_id
            where categories_id = ?', [$category_id],
            __CLASS__);
    }


    public function getUrl() {
        return 'index.php?p=article&id=' . $this->articles_id;
    }

    public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}