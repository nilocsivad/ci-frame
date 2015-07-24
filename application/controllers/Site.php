<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Site extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model( "Site_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->Site_dal->list_split( $_GET, $page, $size );
			
		if ( $this->is_login() ) {
			$online = $this->online();
			
			if ( $online->status == 100 ) { // ** normal status
				$data[ "new_site" ] = true;
				$data[ "del_site" ] = true;
			}
			if ( $online->type == 999 ) { // ** manager
				$data[ "remove_all" ] = true;
			}
		}
		
		$this->load->view( 'site/list', $data );
	}
	
	public function new_ws() {
		$this->load->view( 'site/new_ws' );
	}
	
	public function create() {
		if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
			
			if ( $this->is_login() ) {
				
				$title = isset( $_POST[ "title" ] ) ? $_POST[ "title" ] : "";
				$url = isset( $_POST[ "url" ] ) ? $_POST[ "url" ] : "";
				$comment = isset( $_POST[ "comment" ] ) ? $_POST[ "comment" ] : "";
				$data = array( "title" => $title, "url" => $url, "comment" => $comment );
				
				if ( $title == "" || $url == "" ) {
					$this->session->set_flashdata( "msg", "Title or URL can not be null!" );
					redirect( site_url( "site/new_ws" ) );
				} else {
					$data[ "dt_id" ] = date( "Y-m-d H:i:s" );
					$data[ "random_id" ] = rand( 100, 999 );
					$this->Site_dal->new_site( $data );
					redirect( site_url( "site" ) );
				}
			} else {
				$this->session->set_flashdata( "msg", "Unlogin status!" );
				redirect( site_url( "site/new_ws" ) );
			}
		} else {
			$this->session->set_flashdata( "msg", "Unsupported method 'get'!" );
			redirect( site_url( "site/new_ws" ) );
		}
	}
	
	public function remove() {
		if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
			
			if ( $this->is_login() ) {
				
				$random_id = isset( $_POST[ "random_id" ] ) ? $_POST[ "random_id" ] : "";
				$dt_id = isset( $_POST[ "dt_id" ] ) ? $_POST[ "dt_id" ] : "";
				$data = array( "random_id" => $random_id, "dt_id" => $dt_id );
				
				if ( $random_id == "" || $dt_id == "" ) {
					return "Parameters must be not null!";
				} else {
					$this->Site_dal->del_site( $data );
					return 1;
				}
			} else {
				return "Unlogin status!";
			}
		} else {
			return "Unsupported method 'get'!";
		}
	}
	
}