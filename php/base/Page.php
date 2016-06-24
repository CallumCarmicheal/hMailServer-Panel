<?php
	
	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 01:17
	 * @description		Handles the start and end of every page but mainly would do nothing just room
	 *					for later ideas!
	 * @updates			
	 */
	
	namespace Base;
	
	class Page {
	
		public static function StartPage() { 
			\Auth\Session::Init();
			ComObj::Init();
		}
	
		public static function EndPage() {
			exit;
		}
		
		public static function AutoAuthRedirect() {
			if(!\Auth\User::LoggedIn()) {
				header("location: index.php");
				die("Redirecting to index.php");
			}
		}
		
		public static function GenerateLink($page, $args = null) {
			$page = "index.php?page=". $page;
			
			if(is_array($args)) {
				foreach ($args as $key => $value) {
					$page .= "&". $key. "=". $value;
				}
			} else if (!empty($args)) {
				$page .= "&". $args;
			}
			
			return "#";
		}
	}