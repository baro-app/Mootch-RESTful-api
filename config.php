<?php
    error_reporting(E_ALL);
	/** core paths **/
	define('ROOT_PATH', dirname(__FILE__).'/');
	define('LC_PATH', ROOT_PATH.'litecage/');
	define('APP_PATH', ROOT_PATH.'webapp/');
	define('CORE_PATH', LC_PATH.'core/');
	define('PLUGINS_PATH', LC_PATH.'plugins/');
	define('MODELS_PATH', APP_PATH.'models/');
	/** other paths and file names**/
	define('MODULES_DIRECTORY', 'modules/');
	define('CONTROLLER_FILE', 'controller.class.php');
	define('CONTROLLER_CLASS', 'controller');
	define('LAYOUT_DIRECTORY', 'layouts/');
	define('VIEWS_DIRECTORY', 'views/');
	/** defaults **/
	define('DEFAULT_TITLE', 'BlastPress - Fast and Simple SMS Delivery Service');
	define('DEFAULT_LAYOUT', 'raw.php');
	define('DEFAULT_MODULE', 'index');
	define('DEFAULT_ACTION', 'index');

	/** database abstraction layer **/
	function init_dal(&$reg) {
		$reg->db = mysqli_connect('localhost', 'root', 'd3ftsource', 'mootch_dev');
	}
?>
