<?php

	// ---------------
		// ----- set mb_http_output encoding to UTF-8 -----
			mb_http_output('UTF-8');
		// ----- setup php for working with Unicode data -----
			mb_internal_encoding('UTF-8');
			mb_http_output('UTF-8');
			mb_http_input('UTF-8');
			mb_language('uni');
			mb_regex_encoding('UTF-8');
			ob_start('mb_output_handler');
		// ----- DEBUG SETUP
			define("framework_incl_debug", 0);
	// ---------------

	function hmailGetVar($p_varname, $p_defaultvalue = null) {
		$retval = $p_defaultvalue;
		if(isset($_GET[$p_varname])) {
			$retval = $_GET[$p_varname];
		} else if (isset($_POST[$p_varname])) {
			$retval = $_POST[$p_varname];
		} else if (isset($_REQUEST[$p_varname])) {
			$retval	= $_REQUEST[$p_varname];
		}
		
		if (get_magic_quotes_gpc()) 
			$retval = stripslashes($retval);
		return $retval;
	}
	
	function _require_all($dir, $depth=0) {
		if ($depth > 50) {
			return;
		}
		
		// require all php files
		$scan = glob("$dir/*");
		foreach ($scan as $path) {
			if (preg_match('/\.php$/', $path)) {
				if(framework_incl_debug == 1) 
					echo "Included $path <br>";
				require_once $path;
			} else if (is_dir($path)) {
				_require_all($path, $depth+1);
			}
		}
	}
	
	
	
	function IncludeEveryDependancy() {
		$dirs = array(
			'config',
			'auth',
			'base',
			'design',
			'include'
		); foreach($dirs as $str) {
			_require_all("php/". $str);
		}
	}
	


	// Include our dependancies
	IncludeEveryDependancy();