<?php

	class router {

		var $reg;

		var $uri_parameters;

		function __construct($reg) {
			$this->uri_parameters = array();
			$this->reg = $reg;
			$route = explode('/', $reg->route);
			$reg->module = !empty($route[0]) ? $route[0] : DEFAULT_MODULE;
			$reg->action = isset($route[1]) ? $route[1] : DEFAULT_ACTION;
			$controller_path = APP_PATH.MODULES_DIRECTORY.$reg->module.'/'.CONTROLLER_FILE;
			if(count($route) > 2) for($i=2; $i<count($route); $i++) $this->uri_parameters[] = $route[$i];
			if(!file_exists($controller_path)) {
				throw new Exception('Module not found '.$controller_path);
			} else {
				$reg->controller_path = $controller_path;
			}
			$this->reg = $reg;
		}

		function route() {
			$reg = $this->reg;
			$view_path = APP_PATH.MODULES_DIRECTORY.$reg->module.'/'.VIEWS_DIRECTORY.$reg->action.'.php';
			require_once($reg->controller_path);
			$action = $reg->action;
			$controller_class = CONTROLLER_CLASS;
			$controller = new $controller_class($reg);
			call_user_func_array(array($controller,$action),$this->uri_parameters);
            if(!file_exists($view_path) && !$this->reg->disable_views) {
                throw new Exception('View not found '.$view_post);
            }
			$reg->layout->show($view_path, $controller->variables);
		}

	}

?>
