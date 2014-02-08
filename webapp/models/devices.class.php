<?php 

    class devices extends base_model {

        function get_by_dev_id($id) {
            return $this->get_row("SELECT * FROM devices WHERE device_id='{$id}'");
        }

    }
