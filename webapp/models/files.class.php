<?php

    class files extends base_model {

        function create($jobid, $originalname, $filename) {
            $sql = "INSERT INTO files SET job_id={$jobid}, original_name='{$originalname}', file_name='{$filename}', created_at=UNIX_TIMESTAMP();";
            if($this->query($sql)) return $this->insert_id();
            else return false;
        }

        function get_by_jobid($id) {
            $sql = "SELECT f.*, count(*) as recipient_count FROM `files` f, recipients r WHERE f.job_id={$id} AND r.file_id=f.id GROUP BY r.file_id"; //SELECT * FROM files WHERE job_id={$id}";
            return $this->get_rows($sql);
        }

        function delete_file($jid) {
            $sql = "DELETE FROM files WHERE id={$jid}";
            return $this->query($sql);
        }

    }
