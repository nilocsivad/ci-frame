<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Doublecolorball extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model( "Doublecolorball_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->Doublecolorball_dal->list_split( $_GET, $page, $size );
		$this->load->view ( 'dcb\list', $data );
	}
	
}