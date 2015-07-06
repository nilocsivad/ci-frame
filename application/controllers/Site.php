<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Site extends Mange_Login_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model( "Site_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->Site_dal->list_split( $_GET, $page, $size );
		$this->load->view ( 'site\list', $data );
	}
	
	public function new_ws() {
		$this->load->view ( 'site\new_ws' );
	}
	
}