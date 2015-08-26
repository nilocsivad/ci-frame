<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class Dal_bicolorball extends CI_Model {
	const TABLE_NAME = "tbl_double_color_ball";
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
			
			$data [ "list" ] = $q->order_by( "dcb_num", "DESC" )->limit( $size, $offset )->get()->result();
			$data [ "length" ] = $length;
			$data [ "sum" ] = $sum;
			$data [ "offset" ] = $offset;
			$data [ "page" ] = $page;
			$data [ "size" ] = $size;
		}
		return $data;
	}
	private function pack_q( $param, &$data ) {
		$q = $this->db->from( self::TABLE_NAME );
		{
			$allrb = isset( $param[ "allrb" ] ) ? $param[ "allrb" ] : "";
			if ( $allrb == null || $allrb == "" ) {} else { $q->like( "allrb", $allrb, 'before/after/both' ); }
			$data[ "allrb" ] = $allrb;
			
			// $lname = isset( $param[ "lname" ] ) ? $param[ "lname" ] : "";
			// if ( $lname == null || $lname == "" ) {} else { $q->like( "lname", $lname, 'before/after/both' ); }
			// $data[ "lname" ] = $lname;
			
			// $status = isset( $param[ "status" ] ) ? $param[ "status" ] : "";
			// if ( $status == null || $status == "" ) {} else { $q->where( "status", $status ); }
			// $data[ "status" ] = $status;
		}
		return $q;
	}
	function count( $data = null ) {
		$q = $this->db->from( self::TABLE_NAME );
		if ( $data != null )
			$q->where( $data );
		return $q->count_all_results();
	}
	function insert( $data ) {
		$this->db->insert( self::TABLE_NAME, $data );
	}
	function lastest() {
		return $this->db->from( self::TABLE_NAME )->order_by( "dcb_num", "DESC" )->limit( 1, 0 )->get()->result()[ 0 ];
	}
}