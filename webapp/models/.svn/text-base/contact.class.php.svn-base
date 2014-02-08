<?php

    class contact extends base_model {

        function create($email, $message) {
            $sql = "INSERT INTO contact SET email='{$email}', message='{$message}', created_at=UNIX_TIMESTAMP();";
            if($this->query($sql)) return $this->insert_id();
            else return false;
        }

    }
