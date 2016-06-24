<?php
	
	
	require("include.everything.php");
	
	Base\Page::StartPage();
	global $_SESSION;
	
	if(Auth\User::LoggedIn()) {
		header("location: dashboard.php");
		die("Redirecting to dashboard.php");
	} else {
		global $PAGE_CALL;
		$PAGE_CALL 	= "login.php";
		$INCL_DIR 		= "php/pages/";
		include($INCL_DIR. $PAGE_CALL);
	}