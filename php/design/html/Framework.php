<?php
	
	/**
	 * @author 			Callum Carmicheal
	 * @date			21/06/2016 01:48
	 * @description		The file that just does <html>, yeah i know its the most important one yet!
	 * @updates			
	 */
	 
	namespace Design\HTML;
	
	class Framework {
	
		public static function StartHTML() {
			return '<!DOCTYPE html><html lang="en">';
		}
		
		public static function StartBody() {
			return '<body class="nav-md">';
		}
	
		public static function EndBody() {
			return "</body>";
		}
		
		public static function EndHTML() {
			return "</html>";
		}
	}