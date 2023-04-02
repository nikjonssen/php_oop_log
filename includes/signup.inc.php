<?php

if (isset($_POST['signup'])) {
    include_once "dbh.inc.php";
    include_once "../classes/db.class.php";
    include_once "../classes/signup.class.php";
    include_once "../classes/signupcontroller.class.php";

    [
        'uid' => $uid,
        'email' => $email,
        'pwd' => $pwd,
        'pwdrep' => $pwdrep,
    ] = $_POST;

    $signup = new SignupController($dbname, $uid, $email, $pwd, $pwdrep);
    $signup->signupUser();
}