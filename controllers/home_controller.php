<?php

$wikiClass = new Wiki($db, null, null, null, null, null);
$wikis = $wikiClass->getAllWikisWithDetails();

// dd($wikis);

?>