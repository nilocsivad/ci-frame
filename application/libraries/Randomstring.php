<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Randomstring {
	
	function __construct() {
		//parent::__construct();
	}
	
	private static $ARR = array( "a", "A", "b", "B", "c", "C", "d", "D", "e", "E", "f", "F", "g", "G", "h", "H", "i", "I", "j", "J", "k", "K", "l", "L", "m", "M", "n", "N", "o", "O", "p", "P", "q", "Q", "r", "R", "s", "S", "t", "T", "u", "U", "v", "V", "w", "W", "x", "X", "y", "Y", "z", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9" );
	private static $len = 0;
	
	function Generate( $len = 10 ) {
		self::$len = count( self::$ARR ) - 1;
		$string = "";
		for ( $i = 0; $len > $i; $i++ ) {
			$string .= $this->one_code();
		}
		return $string;
	}
	
	function one_code() {
		$idx = rand( 0, self::$len );
		return self::$ARR[ $idx ];
	}
	
}
