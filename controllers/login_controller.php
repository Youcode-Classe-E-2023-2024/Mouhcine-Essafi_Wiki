<?php
// session_start();
// echo $_POST['log_email'];
if (isset($_POST['email'])) {
    $UserLogin = new UserLogin($db);
    $UserLogin = $UserLogin->loginUser($_POST['email'], $_POST['password']);
    // echo $UserLogin ;
    if (is_int($UserLogin) === true) {
        $_SESSION['email'] = $_POST['email'];
        echo "Login successful";
        die();
    } else {
        echo $UserLogin;
        echo $UserLogin;

        die();
    }
}
