<?php

abstract class base_model {

    var $reg;
    var $table;

    function __construct($reg,$table) {
           $this->reg = $reg;
           $this->table = $table;
    }

    function query($sql) {
        return $this->reg->db->query($sql);
    }

    function insert_id() {
        return $this->reg->db->insert_id;
    }

    function get_by_id($id) {
        return $this->get_row("SELECT * FROM {$this->table} WHERE id={$id}");
    }

    function get_rows($sql) {
        $result = $this->reg->db->query($sql);
        $rows = array();
        if($result->num_rows> 0) {
            while($row = $result->fetch_assoc()) $rows[] = $row;
        }
        return $rows;
    }

    function get_row($sql) {  
        $rows = $this->get_rows($sql);
        if(count($rows)<1) {
            return false;
        } else {
            return $rows[0];
        }
    }

    function write_column($column,$value,$id) {
        $sql = "UPDATE {$this->table} SET {$column}='{$value}' WHERE id={$id}";
        if($this->reg->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function insert_row($values) {
        $vals;
        foreach($values as $key=>$value) {
            $vals.=$vals==""?"":",";
            $vals.="{$key}='{$value}'";
        }
        if(!array_key_exists("created_at",$values)) {
            $vals.=",created_at=UNIX_TIMESTAMP()";
        }
        if(!$this->query("INSERT INTO {$this->table} SET {$vals}")) return false;
        return $this->insert_id();
    }

    function get_recent($time=86400, $limit=100) {
        return $this->get_rows("SELECT * FROM listings WHERE created_at > UNIX_TIMESTAMP() - {$time} LIMIT {$limit}");
    }

}

?>
