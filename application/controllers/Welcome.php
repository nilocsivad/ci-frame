<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model( "Dal_bicolorball" );
	}
	
	public function index() {
		$online = $this->session->userdata( parent::ONLINE_KEY );
		$data = array( "is_login", ( empty( $online ) ? false : $online ) );
		$rowData = $this->Dal_bicolorball->lastest();
		$data[ "ball" ] = $rowData;
		$this->load->view( 'welcome', $data );
	}
}
