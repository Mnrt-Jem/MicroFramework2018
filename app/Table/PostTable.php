<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{

    protected $table = 'articles';

    /**
     * Récupère les derniers article
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, articles.slug
            FROM articles
            ORDER BY articles.date DESC");
    }


    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, articles.slug
            FROM articles
            WHERE articles.id = ?", [$id], true);
    }
}