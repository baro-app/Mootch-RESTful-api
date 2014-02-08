<?php

	class class_loader {

		static function load($class_name) {
			$class_path = false;
			if(file_exists(CORE_PATH.$class_name.'.class.php')) {
				$class_path = CORE_PATH.$class_name.'.class.php';
			} elseif(file_exists(PLUGINS_PATH.$class_name.'.class.php')) {
				$class_path = PLUGINS_PATH.$class_name.'.class.php';
            } elseif(file_exists(PLUGINS_PATH.$class_name.'.php')) {
                $class_path = PLUGINS_PATH.$class_name.'.php';
			} elseif(file_exists(MODELS_PATH.$class_name.'.class.php')) {
				$class_path = MODELS_PATH.$class_name.'.class.php';
			}
			if($class_path) {
				include($class_path);
			} else {
				throw new Exception('class_loader::load() - class not found: '.$class_name);
				return false;
			}
		}

	}

?>
