<?php

$wikiClass = new Wiki($db, null, null, null, null, null);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $wikiId = $_GET['id'];
    $wiki = $wikiClass->getDetailedWikiById($wikiId);

// echo "<pre>";
// print_r($wiki);
// echo "<pre>";

}


?>