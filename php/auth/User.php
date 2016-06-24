<?php 

	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 02:58
	 * @description	 	Functions related and regarding to the user
	 * @updates			
	 */
	 
	 
	namespace Auth;
	 
	class User {
		public static function LoggedIn() {
			global $_SESSION;
		
			if (isset($_SESSION['hMS']['session_loggedin']) && $_SESSION['hMS']['session_loggedin'] == "1")
				 return true;
			else return false;
		}
		
		public static function GetID() {
			global $_SESSION;
		
			if (isset($_SESSION['hMS']["session_accountid"]))
				 return $_SESSION['hMS']["session_accountid"];
			else return -1;
		}
	
		public static function GetUsername() {
			global $_SESSION;
			
			if(!User::LoggedIn())
				return "LoggedOut!";
			
			return "Administrator";
		}
	}