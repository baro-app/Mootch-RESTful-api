<?php

    class recipients extends base_model {

        function create($jobid, $number, $fileid) {
            $sql = "INSERT INTO recipients SET job_id={$jobid}, file_id={$fileid}, phone='{$number}', created_at=UNIX_TIMESTAMP();";
            if($this->query($sql)) return $this->insert_id();
            else return false;
        }

        function get_by_jobid($id) {
            $sql = "SELECT * FROM recipients WHERE job_id={$id}";
            return $this->get_rows($sql);
        }

        function delete_like_number($num, $jid) {
            $sql = "DELETE FROM recipients WHERE job_id={$jid} AND phone LIKE '{$num}'";
            return $this->query($sql);
        }

        function delete_file($fileid) {
            $sql = "DELETE FROM recipients WHERE file_id={$fileid}";
            return $this->query($sql);
        }    

    }
