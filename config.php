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

    /** stripe **/
    define('STRIPE_K', 'A1EirK1PRu03BYoKgLdr5VO59LM2uT12');
    define('STRIPE_PK', 'pk_SFXPLCN5J8ugZiFOT2jfr0qrdKTcy');

    /** twilio **/
    define('TWILIO_SID', 'AC6fc27941a8504aef9345f986b2352c95');
    define('TWILIO_TOKEN', 'c41416169a9052dd8d3766ce09e92ddd');
    define('TWILIO_SMS_URL', 'https://blast.flyk.it/sms/incoming');
    define('TWILIO_APP_SID', 'AP56a0a061b5a926d230594edef7465204'); //'APa3e3eed377644e849949bec57492c2fb');
    define('APP_NUMBER', '+14025133595');
    define('MINIMUM_RECS', 50);

	/** database abstraction layer **/
	function init_dal(&$reg) {
		$reg->db = mysqli_connect('localhost', 'root', 'd3ftsource', 'mootch_dev');
	}
?>
