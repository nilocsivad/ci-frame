<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User_dal extends CI_Model {
	const TABLE_NAME = "tbl_users";
	function __construct() {
		parent::__construct();
		$this->db->from( self::TABLE_NAME );
	}
	function list_split($page = 1, $size = 30) {
		$length = $this->db->count_all();
		$sum = $length % $size > 0 ? $length / $size + 1 : $length / $size;
		$page = $page <= $sum ? $page : $sum;
		$page = $page <= 1 ? 1 : $page;
		$offset = ( $page - 1 ) * $size;
		return $this->db->limit( $offset, $size )->get()->result();
	}
}