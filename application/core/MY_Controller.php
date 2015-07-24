<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class MY_Controller extends CI_Controller {

	const ONLINE_SESSION_KEY = "MY_Controller.ONLINE_SESSION_KEY";
	const ONLINE_KEY = "MY_Controller.ONLINE_KEY";
	
	function __construct() {
		parent::__construct();
	}
	
	/** get session data */
	function sess( $key ) {
		return $this->session->userdata( $key );
	}
	
	/** get online user object 
	 * @return online user data */
	function online() {
		return $this->sess( self::ONLINE_SESSION_KEY );
	}
	
	/** put login user to session */
	function put_online( $data ) {
		$this->session->set_userdata( self::ONLINE_SESSION_KEY, $data );
	}
	
	/** is there has somebody online? 
	 * @return true is online, others not */
	function is_login() {
		$online = $this->sess( self::ONLINE_SESSION_KEY );
		return ( !empty( $online ) && $online->status == 100 );
	}
	
}
