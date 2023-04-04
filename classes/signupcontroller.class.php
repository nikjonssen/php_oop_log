<?php

class SignupController extends Signup {

    private $uid;
    private $email;
    private $pwd;
    private $pwdrep;

    public function __construct(string $dbname, string $uid, string $email, string $pwd, string $pwdrep){
        parent::__construct($dbname);
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdrep = $pwdrep;
    }

    public function signupUser(){
        if ($this->emptyInput()) {
            header("location: ../index.php?error=emptysigninput");
            exit();
        };
        if ($this->invalidUsername()) {
            header("location: ../index.php?error=invaliduid");
            exit();
        };
        if ($this->invalidEmail()) {
            header("location: ../index.php?error=emailinvalid");
            exit();
        };
        if (!$this->pwdMatch()) {
            header("location: ../index.php?error=passunmatch");
            exit();
        };
        if ($this->userExists()) {
            header("location: ../index.php?error=userexist");
            exit();
        };

        if (!$this->setUser($this->uid, $this->email, $this->pwd)) {
            header("location: ../index.php?error=signupfailed");
            exit();
        };
        
        header("location: ../index.php?signup=success");
    }

    private function emptyInput(){
        if (empty($this->uid) || empty($this->email) || empty($this->pwd) || empty($this->pwdrep)) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidUsername(){
        if (!preg_match("/^[a-zA-Z0-9_\-]*$/", $this->uid)) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidEmail(){
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function pwdMatch(){
        if ($this->pwd === $this->pwdrep) {
            return true;
        } else {
            return false;
        }
    }

    private function userExists(){
        if ($this->checkUser( $this->uid, $this->uid )) {
            return true;
        } else {
            return false;
        }
    }

}