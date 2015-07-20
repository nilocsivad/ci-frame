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
	
	public function create() {
		$title = isset( $_POST[ "title" ] ) ? $_POST[ "title" ] : "";
		$url = isset( $_POST[ "url" ] ) ? $_POST[ "url" ] : "";
		$comment = isset( $_POST[ "comment" ] ) ? $_POST[ "comment" ] : "";
		$data = array( "title" => $title, "url" => $url, "comment" => $comment );
		
		if ( $title == "" || $url == "" ) {
			$data[ "msg" ] = "Title or URL can not be null!";
			$this->load->view ( 'site\new_ws', $data );
		} else {
			$data[ "dt_id" ] = date( "Y-m-d H:i:s" );
			$data[ "random_id" ] = rand( 100, 999 );
			$this->Site_dal->new_site( $data );
			redirect( site_url( "site" ) );
		}
	}
	
	public function remove() {
		$random_id = isset( $_POST[ "random_id" ] ) ? $_POST[ "random_id" ] : "";
		$dt_id = isset( $_POST[ "dt_id" ] ) ? $_POST[ "dt_id" ] : "";
		$data = array( "random_id" => $random_id, "dt_id" => $dt_id );
		
		if ( $random_id == "" || $dt_id == "" ) {
		} else {
			$this->Site_dal->del_site( $data );
		}
	}
	
}