<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Site_dal extends CI_Model {
	
	const TABLE_NAME = "tbl_site";
	
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
		
			$data[ "list" ] = $q->order_by( "dt_id", "DESC" )->limit( $size, $offset )->get()->result();
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
			$title = isset( $param[ "title" ] ) ? $param[ "title" ] : "";
			if ( $title == null || $title == "" ) {} else { $q->like( "title", $title, 'before/after/both' ); }
			$data[ "title" ] = $title;
		
			$url = isset( $param[ "url" ] ) ? $param[ "url" ] : "";
			if ( $url == null || $url == "" ) {} else { $q->like( "url", $url, 'before/after/both' ); }
			$data[ "url" ] = $url;
		
			$comment = isset( $param[ "comment" ] ) ? $param[ "comment" ] : "";
			if ( $comment == null || $comment == "" ) {} else { $q->like( "comment", $comment, 'before/after/both' ); }
			$data[ "comment" ] = $comment;
		}
		return $q;
	}
	
	function new_site( $data ) {
		$this->db->insert( self::TABLE_NAME, $data );
	}
	
	function del_site( $data ) {
		$this->db->where( $data )->delete( self::TABLE_NAME );
	}
	
}