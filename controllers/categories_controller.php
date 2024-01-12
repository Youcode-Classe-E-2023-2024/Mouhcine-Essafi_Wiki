<?php
    // GET ALL Categorie
$categoriesClass = new categories($db);
$allCategories = $categoriesClass->getAllCategories();


if(isset($_POST['add_catego'])){
    $newCatego = new categories($db);
    $newCatego->createCategory($_POST['name']);
    header('Location: index.php?page=categories');
}


if(isset($_POST['delete_catego'])){
    $categoryIDToDelete = $_POST['category_id'];
    $categoriesClass = new categories($db);
    $categoriesClass->deleteCategory($categoryIDToDelete);
    header('Location: index.php?page=categories');
}


if(isset($_POST['update_catego'])){
    $categoryIdToUpdate = $_POST['category_id'];
    $updatedName = $_POST['name'];

    $categoriesClass = new categories($db);
    $categoriesClass->updateCategory($categoryIdToUpdate, $updatedName);
    header('Location: index.php?page=categories');
}

?>