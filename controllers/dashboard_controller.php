<?php
// get number of Users 
$userLogin = new UserLogin($db);
$userCount = $userLogin->countUsers();

// get number of wikis
$wikiClass = new Wiki($db, null, null, null, null, null);
$wikisCount = $wikiClass->countWikis();

// get number of Tags
$tagsClass = new Tags($db);
$TagsCount = $tagsClass->countTags();

// get number of Categories 
$CategoriesClass = new categories($db);
$CategoriesCount = $CategoriesClass->countCategories();
