<?php 

	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 02:35
	 * @description	 	Session variables and storage
	 * @updates			
	 */
	 
	 
	 namespace Auth;
	 
	 class Session {
		public static $SessionVariable 	= "hmailserver-panel";
		
		public static function Init() {
			global $_SESSION;
			
			session_start();
		}
		
		public static function EndSession() {
			// Logout
			unset($_SESSION['hMS']);
		}
	 }