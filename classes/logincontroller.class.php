<?php

class LoginController extends Login {

    private $uid;
    private $pwd;

    public function __construct(string $dbname, string $uid, string $pwd){
        parent::__construct($dbname);
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if ($this->emptyInput()) {
            header("location: ../index.php?error=emptyloginput");
            exit();
        };

        if (!$userdata = $this->getUser($this->uid, $this->pwd)) {
            header("location: ../index.php?error=loginfailed");
            exit();
        };

        session_start();
        $_SESSION['userid'] = $userdata["users_id"];
        $_SESSION['useruid'] = $userdata["users_uid"];
        header("location: ../index.php?login=success");
        exit();
    }

    private function emptyInput(){
        if (empty($this->uid) || empty($this->pwd)) {
            return true;
        } else {
            return false;
        }
    }
}