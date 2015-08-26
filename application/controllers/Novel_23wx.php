<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Novel_23wx extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		{
			set_time_limit ( 0 );
			
			$URL = "http://so.23wx.com/";
// 			$F = sprintf ( "%s%d%s%s", "search?s=15772447660171623812&nsid=0&p=", 0, "&q=", "史上第一妖" );
// 			$URL = sprintf ( "%s%s", "http://so.23wx.com/cse/", $F );
// 			$URL = "http://www.23wx.com/html/22/22388/";
// 			$URL = "http://kaijiang.zhcw.com/zhcw/html/ssq/list_0" . ".html";
// 			$URL = "http://translate.google.cn/";
// 			$URL = "http://so.23wx.com/cse/search?q=%E5%8F%B2%E4%B8%8A%E7%AC%AC%E4%B8%80%E5%A6%96&p=0&s=15772447660171623812&nsid=0";
// 			$URL = "http://www.23wx.com/html/9/9005/";
			$timeout = (60 * 1) * 3; // ** 3 minutes
			
			$curl = curl_init ();
			curl_setopt ( $curl, CURLOPT_URL, $URL );
			curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
			$html = curl_exec ( $curl );
			curl_close ( $curl );
			
			$doc = new DOMDocument ();
			$doc->loadHTML ( htmlspecialchars( $html ) );
			$xpath = new DOMXpath ( $doc );
			
			$list = $xpath->query ( "div[@class='result-list']" );
			
			
			$data[ "list" ] = $list;
		}
		$this->load->view ( 'novel/23wx/23wxhome', $data );
	}
	
}