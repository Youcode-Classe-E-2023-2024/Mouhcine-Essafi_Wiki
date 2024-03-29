<?php
if (!isset($_SESSION['id'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<?php

$categoriesClass = new categories($db);
$categories = $categoriesClass->getAllCategories();

$tagsClass = new Tags($db);
$tags = $tagsClass->getAllTags();

// dd($_POST);
if (isset($_POST['wiki'])) {
    $auteurId = $_SESSION['id'];

    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp, "./assets/img/$img_name");

    $wikiTitle = $_POST['title'];
    $wikiContent = $_POST['content'];
    $categorieId = $_POST['category'];

    $wiki = new Wiki($db, $wikiTitle, $wikiContent, $auteurId, $categorieId, $img_name);
    $wikiCreated = $wiki->createWiki();
    if ($wikiCreated) {
        $wikiId = $wiki->getLastInsertId(); // Get the ID of the newly created wiki

        if (!empty($_POST['tags'])) {
            foreach ($_POST['tags'] as $tagId) {
                $wiki->addTagToWiki($wikiId, $tagId);
            }
        }
    }
}
