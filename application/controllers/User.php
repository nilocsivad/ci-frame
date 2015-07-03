<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends Mange_Login_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model( "User_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->User_dal->list_split( $_GET, $page, $size );
		$this->load->view ( 'user\list', $data );
	}
	
	public function increments() {
		$datas = array();
		$this->load->library( "Randomstring" );
		for ( $i = 0; $i < 10; $i++ ) {
			$lname = $this->randomstring->Generate() . "-" . rand();
			$datas[ $i ] = array( "lname" => $lname, "lpwd" => md5( $lname ), "status" => 0 );
		}
		$this->User_dal->new_users( $datas );
	}
}
