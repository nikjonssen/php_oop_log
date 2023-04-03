<?php

class Signup extends DB {

    protected function checkUser(string $uid, string $email){
        $sql = "SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([ $uid, $email])) {
            $stmt = null;
            return false;
        };
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($data) == 0) {
            return false;
            $stmt = null;
        };
        
        $stmt = null;
        return $data;
    }

    protected function setUser(string $uid, string $email, string $pwd){
        $sql = "INSERT INTO users (users_uid, users_email, users_pwd) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if(!$stmt->execute([ $uid, $email, $hashedPwd])) {
            $stmt = null;
            return false;
        };
        
        $stmt = null;
        return true;
    }

}