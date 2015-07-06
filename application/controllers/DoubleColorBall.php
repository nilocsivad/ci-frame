<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Doublecolorball extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model( "Doublecolorball_dal" );
	}
	
	public function index() {
		$page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 1;
		$size = isset( $_GET[ "size" ] ) ? $_GET[ "size" ] : 30;
		$data = $this->Doublecolorball_dal->list_split( $_GET, $page, $size );
		$data[ "class" ] = __CLASS__;
		$data[ "method" ] = __METHOD__;
		$this->load->view ( 'dcb\list', $data );
	}
	
	const DCB_URL = "http://kaijiang.zhcw.com/zhcw/html/ssq/list_";
	private static $sum = 0;
	
	public function increments() {
		
		set_time_limit( 0 );
		
		$idx = 1;
		$data = self::ResolveURL( $idx );
		$doc = new DOMDocument();
		$doc->loadHTML( $data );
		$xpath = new DOMXpath( $doc );
		$doms = $xpath->query( "//html/body/table/tr/td/p[@class='pg']/strong" );
		$sum = $doms[ 0 ]->nodeValue;
		
		$loop = false;
		do {
			$trs = $xpath->query( "//html/body/table/tr" );
			$row_data = self::ResolveCurPage( $trs, $xpath );
			
			foreach ( $row_data as $arr ) {
				$c = $this->Doublecolorball_dal->count( array( "dcb_dt" => $arr[ "dcb_dt" ] ) );
				if ( $c > 0 ) {
					$loop = false;
					break;
				} else {
					$loop = true;
					$this->Doublecolorball_dal->insert( $arr );
				}
			}
			
			if ( count( $data ) < 20 ) // ** 
				break;
			
			if ( $loop ) {
				$idx++;
				$data = self::ResolveURL( $idx );
				$doc = new DOMDocument();
				$doc->loadHTML( $data );
				$xpath = new DOMXpath( $doc );
			}
		} while ( $loop );
		
		self::index();
	}
	
	private function ResolveURL( $i ) {
		$curl = curl_init();
		$timeout = ( 60 * 1 ) * 3; // ** 3 minutes
		curl_setopt( $curl, CURLOPT_URL, ( self::DCB_URL . $i . ".html" ) );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
		$data = curl_exec( $curl );
		curl_close( $curl );
		return $data;
	}
	
	private function ResolveCurPage( $trs, $xpath ) {
		$arr_data = array();
		$idx = 0;
		for ( $i = 2, $l = $trs->length - 1; $l > $i; $i++ ) {
			$tds = $xpath->query( "td", $trs[ $i ] );
			$row[ "dcb_dt" ] = $tds[ 0 ]->nodeValue;
			$row[ "dcb_num" ] = $tds[ 1 ]->nodeValue;
			$ems = $xpath->query( "em", $tds[ 2 ] );
			$row[ "rb1" ] = $ems[ 0 ]->nodeValue;
			$row[ "rb2" ] = $ems[ 1 ]->nodeValue;
			$row[ "rb3" ] = $ems[ 2 ]->nodeValue;
			$row[ "rb4" ] = $ems[ 3 ]->nodeValue;
			$row[ "rb5" ] = $ems[ 4 ]->nodeValue;
			$row[ "rb6" ] = $ems[ 5 ]->nodeValue;
			$row[ "blueb" ] = $ems[ 6 ]->nodeValue;
			$row[ "allrb" ] = $row[ "rb1" ] . $row[ "rb2" ] . $row[ "rb3" ] . $row[ "rb4" ] . $row[ "rb5" ] . $row[ "rb6" ];
			$row[ "allb" ] = $row[ "allrb" ] . $row[ "blueb" ];
			$arr_data[ $idx++ ] = $row;
		}
		return $arr_data;
	}
	
}