<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model( "Dal_user" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->Dal_user->list_split( $_GET, $page, $size );
			
		if ( $this->is_login() ) {
			$online = $this->online();
			
			if ( $online->status == 100 ) { // ** normal status
			}
			if ( $online->type == 900 && $online->status == 100 ) { // ** general manager
				$data[ "new_user" ] = true;
			}
			if ( $online->type == 999 ) { // ** highest manager
				$data[ "new_user" ] = true;
				$data[ "remove_all" ] = true;
			}
		}
		
		if ( $data != null ) {
			foreach ( $data[ "list" ] as $item ) {
				$item->type = $this->_type_i2s( $item->type );
				$item->status = $this->_type_i2s( $item->status );
			}
		}
		
		$this->load->view ( 'user/list', $data );
	}
	
	function _status_i2s( $key ) {
		$val = "";
		switch ( $key ) {
			case 100:
				$val = "Normal";
				break;
			case 101:
				$val = "Inactive";
				break;
			case 102:
				$val = "Locked";
				break;
		}
		return $val;
	}
	
	function _type_i2s( $key ) {
		$val = "";
		switch ( $key ) {
			case 100:
				$val = "Normal";
				break;
			case 900:
				$val = "Manager";
				break;
			case 999:
				$val = "Super Manager";
				break;
		}
		return $val;
	}
	
	public function _increments() {
		$datas = array();
		$this->load->library( "Randomstring" );
		for ( $i = 0; $i < 10; $i++ ) {
			$lname = $this->randomstring->Generate() . "-" . rand();
			$datas[ $i ] = array( "lname" => $lname, "lpwd" => md5( $lname ), "status" => 0 );
		}
		$this->Dal_user->new_users( $datas );
	}
	
	public function enter() {
		$link = isset( $_GET[ "link" ] ) ? $_GET[ "link" ] : "";
		$data = array( "link" => $link );
		$this->session->set_flashdata( $data );
		$this->load->view( 'user/enter', $data );
	}
	
	public function enter_() {
		if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
			$lname = isset( $_POST[ "lname" ] ) ? $_POST[ "lname" ] : "";
			$lpwd = isset( $_POST[ "lpwd" ] ) ? $_POST[ "lpwd" ] : "";
			$link = isset( $_POST[ "link" ] ) ? $_POST[ "link" ] : "";
			$data = array( "lname" => $lname );
			
			if ( $lname == "" || $lpwd == "" ) {
				$this->session->set_flashdata( "msg", "Login name or Password must not be null!" );
				$data[ "lpwd" ] = $lpwd;
				$data[ "link" ] = $link;
				$this->session->set_flashdata( "data", $data );
				redirect( site_url( "user/enter" ) );
			} else {
				$this->load->library( "Self_md5" );
				$data[ "lpwd" ] = $this->self_md5->general( $lpwd );
				
				$online = $this->Dal_user->login( $data );
				if ( $online == null) {
					$this->session->set_flashdata( "msg", "Login name or Password is wrong!" );
					$data[ "lpwd" ] = $lpwd;
					$data[ "link" ] = $link;
					$this->session->set_flashdata( "data", $data );
					redirect( site_url( "user/enter" ) );
				} else {
					if ( $online->status != 100 ) {
						$this->session->set_flashdata( "msg", "Account is inactive or locked!" );
						$data[ "lpwd" ] = $lpwd;
						$data[ "link" ] = $link;
						$this->session->set_flashdata( "data", $data );
						redirect( site_url( "user/enter" ) );
					} else {
						$this->put_online( $online );
						$this->session->set_userdata( parent::ONLINE_KEY, true );
						redirect( $link == "" ? site_url( "user" ) : $link );
					}
				}
			}
		} else {
			$this->session->set_flashdata( "msg", "Unsupported method 'get'!" );
			redirect( site_url( "user/enter" ) );
		}
	}
	
	public function out() {
		$link = isset( $_GET[ "link" ] ) ? $_GET[ "link" ] : "";
		$this->put_online( null );
		$this->session->set_userdata( parent::ONLINE_KEY, false );
		redirect( $link == "" ? base_url() : $link );
	}
	
	public function new_() {
		$this->load->view( 'user/new_' );
	}
	
	public function create() {
		if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
			
			if ( $this->is_login() ) {
				$lname = isset( $_POST[ "lname" ] ) ? $_POST[ "lname" ] : "";
				$lpwd = isset( $_POST[ "lpwd" ] ) ? $_POST[ "lpwd" ] : "";
				$data = array( "lname" => $lname, "lpwd" => $lpwd );
			
				if ( $lname == "" || $lpwd == "" ) {
					$this->session->set_flashdata( "msg", "Login name or Password must not be null!" );
					$this->session->set_flashdata( "data", $data );
					redirect( site_url( "user/new_" ) );
				} else {
					$this->load->library( "Self_md5" );
					$data[ "lpwd" ] = $this->self_md5->general( $lpwd );
					$data[ "status" ] = 100;
					$data[ "type" ] = 100;
					
					$this->Dal_user->new_user( $data );
					redirect( site_url( "user" ) );
				}
			} else {
				$this->session->set_flashdata( "msg", "Unlogin status!" );
				redirect( site_url( "user/new_" ) );
			}
		} else {
			$this->session->set_flashdata( "msg", "Unsupported method 'get'!" );
			redirect( site_url( "user/new_" ) );
		}
	}
	
}
