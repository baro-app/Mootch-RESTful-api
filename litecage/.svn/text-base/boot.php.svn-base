<?php
	require_once(LC_PATH.'core/class_loader.class.php');

	spl_autoload_register(array('class_loader', 'load'));

	try {
		/** instantiate registry **/
		$reg = new registry();

		/** instantiate core components **/
		$reg->session = new session();
		$reg->layout = new layout($reg);

		/** instantiate DAL **/
		init_dal($reg);

		/** route and execute **/
        if($argc>0) {
            $reg->route = $argv[1];
            $reg->cli = true;
        } else {
            $uri_components = parse_url($_SERVER['REQUEST_URI']);
            $uri_components['path'] = ltrim($uri_components['path'], '/');
            $reg->route = $uri_components['path'];
            $reg->cli = false;
        }
        //TODO: need to add as component to dapi, maybe in router, maybe in session.
        $query = array();
        if(isset($uri_components['query'])) {
            $query_parts = explode('&',$uri_components['query']);
            foreach($query_parts as $part) {
                $kv_pair = explode('=', $part);
                $query[$kv_pair[0]] = isset($kv_pair[1]) ? $kv_pair[1] : false;
            }
        }

        $reg->input = $query;

		$reg->router = new router($reg);
		$reg->router->route();

	} catch(Exception $e) {
		die($e->getMessage());
	}
?>
