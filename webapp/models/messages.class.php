<?php

    class messages extends base_model {

        function create($jobid, $message) {

            $sql = "INSERT INTO messages SET job_id={$jobid}, message='{$message}', created_at=UNIX_TIMESTAMP()";
            if($this->query($sql)) return $this->insert_id();
            else return false;

        }

        function get_by_jobid($id) {
            $sql = "SELECT * FROM messages WHERE job_id={$id}";;
            return $this->get_row($sql);
        }

    }
