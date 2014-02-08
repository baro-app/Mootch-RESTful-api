<?php

	class registry {

		var $variables;

		function __construct() {
			$this->variables = array();
		}

		function __set($index, $value) {
			$this->variables[$index] = $value;
		}

		function __get($index) {
			return isset($this->variables[$index]) ? $this->variables[$index] : false;
		}

	}
?>
