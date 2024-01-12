<?php
    // Get all tags 
$tagsClass = new Tags($db);
$alltags = $tagsClass->getAllTags();

if(isset($_POST['add_tag'])){
    $newCatego = new Tags($db);
    $newCatego->createTags($_POST['name']);
    header('Location: index.php?page=tags');
}


if(isset($_POST['delete_tags'])){
    $tagsIDToDelete = $_POST['tag_id'];

    $tagsClass = new Tags($db);
    $tagsClass->deleteTags($tagsIDToDelete);
    header('Location: index.php?page=tags');
}


if(isset($_POST['update_tag'])){
    $categoryIdToUpdate = $_POST['tag_id'];
    $updatedName = $_POST['name'];

    $categoriesClass = new Tags($db);
    $categoriesClass->updateTags($categoryIdToUpdate, $updatedName);
    header('Location: index.php?page=tags');
}

?>