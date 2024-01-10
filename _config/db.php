<?php

// $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Set PDO to throw exceptions on error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Error connecting to the database: " . $e->getMessage());
}
