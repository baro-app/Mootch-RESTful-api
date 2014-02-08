<?php

	class session {

		function __construct() {
			session_start();
		}

		function __set($index, $value) {
			$_SESSION[$index] = $value;
		}

		function __get($index) {
			return isset($_SESSION[$index]) ? $_SESSION[$index] : false;
		}

	}

?>
