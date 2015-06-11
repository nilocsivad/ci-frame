<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends CI_Controller {
	public function index() {
		$list = array();
		{
			$list[0] = ("a=" . rand());
			$list[1] = ("b=" . rand());
			$list[2] = ("c=" . rand());
			$list[3] = ("d=" . rand());
			$list[4] = ("e=" . rand());
			$list[5] = ("f=" . rand());
			$list[6] = ("g=" . rand());
		}
		$data["list"] = $list;
		$this->load->view ( 'user\list', $data );
	}
}
