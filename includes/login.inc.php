<?php

if (isset($_POST['login'])) {
    include_once "dbh.inc.php";
    include_once "../classes/db.class.php";
    include_once "../classes/login.class.php";
    include_once "../classes/logincontroller.class.php";

    [
        'uid' => $uid,
        'pwd' => $pwd,
    ] = $_POST;

    $login = new loginController($dbname, $uid, $pwd);
    $login->loginUser();
}