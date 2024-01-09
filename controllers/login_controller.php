<?php
// session_start();
// echo $_POST['log_email'];
if (isset($_POST['log_email'])) {
    $userRegistration = new UserLogin($db);
    $registrationResult = $userRegistration->loginUser($_POST['log_email'], $_POST['log_password']);
    // echo $registrationResult ;
    if (is_int($registrationResult) === true) {
        // header('location: index.php?page=home');
        // echo $_POST['log_email'];
        $_SESSION['email'] = $_POST['log_email'];
        echo 'valide';
        die();
    } else {
        // header('location: index.php?page=login');
        // echo $_POST['log_email'];
        echo 'not valide';
        exit();
    }
}
