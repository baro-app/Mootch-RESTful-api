<?php

    class smsnumbers extends base_model {

        function get_numbers($type="") {
            $sql = "SELECT * FROM smsnumbers";
            return $this->get_rows($sql);
        }

    }

?>
