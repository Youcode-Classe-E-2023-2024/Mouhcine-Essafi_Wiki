<?php

class Wiki
{
    private $db;
    public $id;
    public $title;
    public $content;
    public $auteur_id;
    public $categorie_id;
    public $img_name;

    public function __construct($db, $title, $content, $auteur_id, $categorie_id, $img_name)
    {

        $this->db = $db;
        $this->title = $title;
        $this->content = $content;
        $this->auteur_id = $auteur_id;
        $this->categorie_id = $categorie_id;
        $this->img_name = $img_name;
    }

    public function createWiki()
    {

        $stmt = $this->db->prepare("INSERT INTO Wikis (title, content, id_user, id_category, img) VALUES (:title, :content, :id_user, :id_category, :img)");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':id_user', $this->auteur_id);
        $stmt->bindParam(':id_category', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        return $stmt->execute();
    }

    public function updateWiki($id)
    {
        $stmt = $this->db->prepare("UPDATE Wikis SET title = :title, content = :content, categorie_id = :categorie_id, img = :img, edit_at = NOW() WHERE id = :id");

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getWikiById($id)
    {

        $stmt = $this->db->prepare("SELECT * FROM Wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllWikis()
    {

        $stmt = $this->db->prepare("SELECT * FROM Wikis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTagToWiki($wikiId, $tagId)
    {

        $stmt = $this->db->prepare("INSERT INTO Wikis_Tags (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
        $stmt->bindParam(':id_wiki', $wikiId);
        $stmt->bindParam(':id_tag', $tagId);
        return $stmt->execute();
    }

    public function getLastInsertId()
    {

        return $this->db->lastInsertId();
    }

    public function getAllWikisWithDetails()
    {

        $stmt = $this->db->prepare("
            SELECT 
                w.*, 
                u.first_name AS author_name, 
                c.name AS category_name, 
                GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
            FROM wikis w
            LEFT JOIN users u ON w.id_user = u.user_id
            LEFT JOIN categories c ON w.id_category = c.id
            LEFT JOIN wikis_tags wt ON w.id = wt.id_wiki
            LEFT JOIN Tags t ON wt.id_tag = t.id
            WHERE w.status = 'published'
            GROUP BY w.id
            ORDER BY w.edit_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDetailedWikiById($wikiId)
    {
        global $db;
        $stmt = $db->prepare("SELECT w.*, u.first_name AS author_name, c.name AS category_name, GROUP_CONCAT(t.name) AS tags
        FROM wikis w
        JOIN users u ON w.id_user = u.user_id
        JOIN categories c ON w.id_category = c.id
        LEFT JOIN wikis_tags wt ON w.id = wt.id_wiki
        LEFT JOIN Tags t ON wt.id_tag = t.id
        WHERE w.id = :id
        GROUP BY w.id;
        ");
        $stmt->bindParam(':id', $wikiId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
