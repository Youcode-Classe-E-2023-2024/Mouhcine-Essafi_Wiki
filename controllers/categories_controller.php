<?php
    // GET ALL Categorie
$categoriesClass = new Categories($db);
$allCategories = $categoriesClass->getAllCategories();


if(isset($_POST['add_catego'])){
    $newCatego = new Categories($db);
    $newCatego->createCategory($_POST['name']);
    header('Location: index.php?page=categories');
}


if(isset($_POST['delete_catego'])){
    $categoryIDToDelete = $_POST['category_id'];
    $categoriesClass = new Categories($db);
    $categoriesClass->deleteCategory($categoryIDToDelete);
    header('Location: index.php?page=categories');
}


if(isset($_POST['update_catego'])){
    $categoryIdToUpdate = $_POST['category_id'];
    $updatedName = $_POST['name'];

    $categoriesClass = new Categories($db);
    $categoriesClass->updateCategory($categoryIdToUpdate, $updatedName);
    header('Location: index.php?page=categories');
}

?>