<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model( "User_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->User_dal->list_split( $_GET, $page, $size );
			
		if ( $this->is_login() ) {
			$online = $this->online();
			
			if ( $online->status == 100 ) { // ** normal status
			}
			if ( $online->type == 999 ) { // ** manager
				$data[ "remove_all" ] = true;
				$data[ "new_user" ] = true;
				$data[ "$del_user" ] = true;
			}
		}
		
		$this->load->view ( 'user/list', $data );
	}
	
	public function _increments() {
		$datas = array();
		$this->load->library( "Randomstring" );
		for ( $i = 0; $i < 10; $i++ ) {
			$lname = $this->randomstring->Generate() . "-" . rand();
			$datas[ $i ] = array( "lname" => $lname, "lpwd" => md5( $lname ), "status" => 0 );
		}
		$this->User_dal->new_users( $datas );
	}
}
