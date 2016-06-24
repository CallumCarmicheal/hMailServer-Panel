<?php

	require("include.everything.php");
	
	Base\Page::StartPage();
	Auth\Session::EndSession();
	
	header("location: index.php");
	die("Redirecting to index.php");