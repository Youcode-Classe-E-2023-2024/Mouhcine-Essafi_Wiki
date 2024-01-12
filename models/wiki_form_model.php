<?php

class Wiki {
    private $db;
    public $id;
    public $title;
    public $content;
    public $auteur_id;
    public $categorie_id;
    public $img_name;

    public function __construct($db, $title, $content, $auteur_id, $categorie_id, $img_name) {

        $this->db = $db;
        $this->title = $title;
        $this->content = $content;
        $this->auteur_id = $auteur_id;
        $this->categorie_id = $categorie_id;
        $this->img_name = $img_name;
    }

    public function createWiki() {

        $stmt = $this->db->prepare("INSERT INTO Wikis (title, content, id_user, categorie_id, img) VALUES (:title, :content, :auteur_id, :categorie_id, :img)");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':auteur_id', $this->auteur_id);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        return $stmt->execute();
    }

    public function updateWiki($id) {

        $stmt = $this->db->prepare("UPDATE Wikis SET title = :title, content = :content, categorie_id = :categorie_id, img = :img WHERE id = :id");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getWikiById($id) {

        $stmt = $this->db->prepare("SELECT * FROM Wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllWikis() {

        $stmt = $this->db->prepare("SELECT * FROM Wikis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTagToWiki($wikiId, $tagId) {

        $stmt = $this->db->prepare("INSERT INTO Wiki_Tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->bindParam(':tag_id', $tagId);
        return $stmt->execute();
    }

    public function getLastInsertId() {

        return $this->db->lastInsertId();
    }    

    // Additional methods can be added as needed
}
?>