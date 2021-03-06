<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Dal_user extends CI_Model {
	
	const TABLE_NAME = "tbl_user";
	
	function __construct() {
		parent::__construct();
	}
	
	function list_split( $param, $page = 1, $size = 30 ) {

		$q = self::pack_q( $param, $data );
			
		$length = $q->count_all_results();
		$sum = $length % $size > 0 ? floor( $length / $size ) + 1 : $length / $size;
		$page = $page <= $sum ? $page : $sum;
		$page = $page <= 1 ? 1 : $page;
		$offset = ( $page - 1 ) * $size;
		
		$data = array();
		{
			$q = self::pack_q( $param, $data );
		
			$data[ "list" ] = $q->limit( $size, $offset )->get()->result();
			$data[ "length" ] = $length;
			$data[ "sum" ] = $sum;
			$data[ "offset" ] = $offset;
			$data[ "page" ] = $page;
			$data[ "size" ] = $size;
		}
		return $data;
	}
	
	private function pack_q( $param, &$data ) {
		$q = $this->db->from( self::TABLE_NAME );
		{
			$lname = isset( $param[ "lname" ] ) ? $param[ "lname" ] : "";
			if ( $lname == null || $lname == "" ) {} else { $q->like( "lname", $lname, 'before/after/both' ); }
			$data[ "lname" ] = $lname;
		
			$status = isset( $param[ "status" ] ) ? $param[ "status" ] : "";
			if ( $status == null || $status == "" ) {} else { $q->where( "status", $status ); }
			$data[ "status" ] = $status;
		}
		return $q;
	}
	
	function new_users($datas) {
		$this->db->insert_batch( self::TABLE_NAME, $datas );
	}
	
	function new_user( $data ) {
		$this->db->insert( self::TABLE_NAME, $data );
	}
	
	function login( $data ) {
		return $this->db->from( self::TABLE_NAME )->where( $data )->get()->row();
	}
	
}