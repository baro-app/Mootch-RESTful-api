<?php

	interface controller_template {
		function __set($index, $value);
		function __get($index);
		function __construct($reg);
		function init();
		function index_action();
		public function show();
	}

	abstract class base_controller {
		var $variables;

		function __set($index, $value) {
			$this->variables[$index] = $value;
		}

		function __get($index) {
			return $this->variables[$index];
		}

		function __construct($reg) {
			$this->variables = array();
			$this->reg = $reg;
			$this->init();
		}

		public function show() {
			$this->reg->layout->load_layout($this->variables);
		}

        function check_post($vars) {
            if(is_string($vars)) $vars = array($vars);
            foreach($vars as $v) if(!array_key_exists($v,$_POST)) return false;
            return true;
        }

        function add_if_posted($var,$arr) {
            if($this->check_pos($var)) $arr[$var] = $_POST[$var];
            return $arr;
        }

        function jsondie($json_array) {
            die(json_encode($json_array));
        }

        function success($message="", $payload=array()) {
            $basearr = $message == "" ? array('success'=>'true') : array('success'=>'true', 'message'=>$message);
            $res = array_merge($basearr, $payload);
            $this->jsondie($res);
        }

        function fail($message="", $payload=array()) {
            $basearr = $message == "" ? array('success'=>'false') : array('success'=>'false', 'message'=>$message);
            $res = array_merge($basearr, $payload);
            $this->jsondie($res);
        }

        function check_auth() {
            if(!isset($_SESSION['auth']) || $_SESSION['auth']!=1) {
                die('unauth');
            }
        }
	}

?>
