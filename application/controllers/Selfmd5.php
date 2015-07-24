<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Selfmd5 extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library( "Self_md5" );
	}
	
	public function index() {
		$txt = isset( $_GET[ "txt" ] ) ? $_GET[ "txt" ] : "";
		$data[ "txt" ] = $txt;
		if ( $txt != "" ) {
			$data[ "md5" ] = md5( $txt );
			$data[ "out" ] = $this->self_md5->general( $txt );
		}
		$this->load->view ( 'selfmd5/index', $data );
	}
	
}
