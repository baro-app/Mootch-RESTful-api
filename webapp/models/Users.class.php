<?php

    class Users extends base_model {

        function check_auth($email, $password) {
            $sql = "SELECT * FROM users WHERE email='{$email}' AND password=MD5('{$password}')";
            $res = $this->get_rows($sql);
            if(count($res)>0) {
                $user = $res[0];
                $user['last_login'] = time();
                $this->write_column("users","last_login",$user['last_login'],$user['id']);
                return $user;
            } else {
                return false;
            }
        }

    }
