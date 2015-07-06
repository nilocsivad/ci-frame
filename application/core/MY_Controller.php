<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class MY_Controller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function j2() {
		$p = isset( $_GET[ "p" ] ) ? $_GET[ "p" ] : "welcome_message";
		$this->load->view ( $p );
	}
	
}
class Login_Controller extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
}
class Mange_Login_Controller extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
}