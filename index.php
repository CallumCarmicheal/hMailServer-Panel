<?php
	
	
	require("include.everything.php");
	
	Base\Page::StartPage();
	global $_SESSION;
	
	if(Auth\User::LoggedIn()) {
		header("location: pages.php");
		die("Redirecting to pages.php");
	} else {
		global $PAGE_CALL;
		$PAGE_CALL 		= "auth/login.php";
		$INCL_DIR 		= "php/pages/";
		include($INCL_DIR. $PAGE_CALL);
	}