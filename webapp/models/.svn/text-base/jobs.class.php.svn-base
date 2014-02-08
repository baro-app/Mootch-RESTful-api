<?php

    class jobs extends base_model {
        
        function create($email, $cell) {
            $sql = "INSERT INTO jobs SET owner_email='{$email}', owner_cell='{$cell}', status='unconfirmed', created_at=UNIX_TIMESTAMP()";
            if($this->query($sql)) return $this->insert_id();
            else return false;
        }

        function get_by_id($id) {
            $sql = "SELECT * FROM jobs WHERE id = {$id}";
            $res = $this->query($sql);
            if($res->num_rows>0) return $res->fetch_assoc();
            else return false;
        }

        function get_by_hash($id) {
            $sql = "SELECT * FROM jobs WHERE hash='{$id}'";
            $res = $this->query($sql);
            if($res->num_rows>0) return $res->fetch_assoc();
            else return false;
        }
        function start($id) {
            $this->query("UPDATE jobs SET start_time=UNIX_TIMESTAMP(), status='started' WHERE id={$id}");
        }
        
        function finish($id) {
            $this->query("UPDATE jobs SET finish_time=UNIX_TIMESTAMP(), status='finished' WHERE id={$id}");
        }

        function set_confirmation_code($id, $code) {
            return $this->write_column('jobs','confirmation_code',$code, $id);
        }

        function confirm($id) {
            return $this->write_column('jobs','status','unpaid',$id);
        }

        function get_next_queued() {
            $sql = "SELECT * FROM jobs WHERE delivery_status='Queued' AND status='paid' ORDER BY created_at DESC LIMIT 1";
            return $this->get_row($sql);
        }

        function delivery_status($id, $status) {
            return $this->write_column('jobs','delivery_status',$status,$id);
        }

    }
