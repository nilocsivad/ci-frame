<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends Mange_Login_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model( "User_dal" );
	}
	public function index() {
		$data["list"] = $this->User_dal->list_split();
		$this->load->view ( 'user\list', $data );
	}
}
