<?php
	
	require("include.everything.php");
	
	// Post is set
	if(!empty($_POST)) {
		// Manually setup session
		Auth\Session::Init();
		global $_SESSION;
		
		// Default values
		$userExists = false;
		$passExists = false;
		
		// Check for username and password
		if(!empty($_POST['username']))  		$userExists = true;
		if(!empty($_POST['password']))  		$passExists = true;
		if(strlen($_POST['username']) == 0)  	$userExists = false;
		if(strlen($_POST['password']) == 0)  	$userExists = false;
			
		if($userExists & $passExists) {
			// Store into session
			$_SESSION['hMS']['session_username'] = $_POST['username'];
			$_SESSION['hMS']['session_password'] = $_POST['password'];
			
			// Connect
			Base\ComObj::Init();
			
			global $obBaseApp;
		   
			$username = $_POST['username'];
			$password = $_POST['password'];
		   
			$obAccount = $obBaseApp->Authenticate($username, $password);
			if (!isset($obAccount)) {
				header("location: index.php?errid=1");
				die("Could not login : Redirecting to index.php");
			}
			
			$_SESSION['hMS']['session_loggedin'] 	= 1;
			$_SESSION['hMS']['session_adminlevel'] 	= $obAccount->AdminLevel();
			$_SESSION['hMS']['session_username']  	= $obAccount->Address;
			$_SESSION['hMS']['session_password']  	= $password;
			$_SESSION['hMS']['session_domainid']  	= $obAccount->DomainID();
			$_SESSION['hMS']['session_accountid'] 	= $obAccount->ID();
			
			header("location: index.php");
			die	  ("Login Success: redirecting to index.php");
		} else {
			header("location: index.php?errid=2");
			die("One of the fields were invalid : Redirecting to index.php");
		}
	}
	
	
	header("location: index.php?errid=1");
	die("Redirecting INVAL to index.php?errid=1");