<?php

if (isset($_POST['email'])) {
    $userRegistration = new UserRegistration($db);
    $registrationResult = $userRegistration->registerUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    echo $registrationResult;
    die();
}