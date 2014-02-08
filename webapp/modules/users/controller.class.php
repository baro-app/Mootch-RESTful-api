<?php

    class controller extends base_controller {

        function init() {
            $this->users = new users($this->reg, "users");
        }

        function index() {

        }

        function get_by_id($id) {
            $this->success("",array('user'=>$this->users->get_by_id($id)));
        }

    }
