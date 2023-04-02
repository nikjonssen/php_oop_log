<?php

class Login extends DB {

    protected function getUser(string $uid, string $pwd){
        $sql = "SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([ $uid, $uid])) {
            $stmt = null;
            return false;
            exit();
        };
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) == 0) {
            $stmt = null;
            return false;
            exit();
        };
        
        $pwdHashedDb = $data[0]["users_pwd"];
        $checkPwd = password_verify($pwd, $pwdHashedDb);
        if ($checkPwd === false) {
            $stmt = null;
            return false;
            exit();
        };

        $stmt = null;
        return $data[0];
    }

}