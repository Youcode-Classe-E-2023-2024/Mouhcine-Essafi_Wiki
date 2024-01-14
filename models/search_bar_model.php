<?php

class Search
{

    /**
     * @param $title
     * @return mixed
     * this function searches for titles of the same keyword entered by user
     */
    static function searchForTitles($title)
    {
        global $db;
        // % means 0 or more char before or after entered keyword
        $title = "%" . "$title" . "%";
        $sql = "SELECT * FROM wikis WHERE title LIKE :title AND status = 'published'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    /**
     * @param $tag
     * @return mixed
     * this function searches for tags of the same keyword entered by user
     */
    static function searchForTags1($tag)
    {
        global $db;

        // % means 0 or more char before or after entered keyword
        $tag = "%" . "$tag" . "%";
        $sql = "SELECT tag.*, wiki.* FROM wiki_tag
                JOIN tag ON wiki_tag.tag_id = tag.tag_id
                JOIN wiki ON wiki_tag.wiki_id = wiki.wiki_id
                WHERE tag LIKE :tag";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    static function searchForTags($tag)
{
    global $db;

    // % means 0 or more characters before or after the entered keyword
    $tag = "%" . "$tag" . "%";

    $sql = "SELECT 
                wikis.*, 
                users.first_name AS author_name, 
                categories.name AS category_name, 
                GROUP_CONCAT(tags.name SEPARATOR ', ') AS tags
            FROM wikis
            JOIN wikis_tags ON wikis.id = wikis_tags.id_wiki
            JOIN tags ON wikis_tags.id_tag = tags.id
            LEFT JOIN users ON wikis.id_user = users.user_id
            LEFT JOIN categories ON wikis.id_category = categories.id
            WHERE tags.name LIKE :tag
            GROUP BY wikis.id
            ORDER BY wikis.edit_at DESC";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

}
