<?php

if(isset($_GET["search_title"])) {
    $input_value = $_GET["input_value"];
    $searchedData = Search::searchForTitles($input_value);

    echo json_encode($searchedData);
    exit;
}

if(isset($_GET["search_tag"])) {
    $input_value = $_GET["input_value"];
    $searchedData = Search::searchForTags($input_value);

    echo json_encode($searchedData);
    exit;
}