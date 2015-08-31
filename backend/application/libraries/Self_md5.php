<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Self_md5 {
	
	function __construct() {
		//parent::__construct();
	}
	
	function general( $txt ) {
		$md5 = "";
		if ( $txt != null && ( $len = strlen( $txt ) ) > 0 ) {
			$md5 = md5( $txt );
			$cut = ( $len == 32 ? 16 : $len % 32 );
			$md5 = strtoupper( substr( $md5, 0, $cut ) ) . strtolower( substr( $md5, $cut ) );
			$md5 = md5( $md5 );
			$md5 = strtolower( substr( $md5, 0, $cut ) ) . strtoupper( substr( $md5, $cut ) );
			$md5 = md5( $md5 );
		}
		return $md5;
	}
	
}
