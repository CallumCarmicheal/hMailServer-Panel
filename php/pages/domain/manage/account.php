<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		define('PAGE_CURRENT', 'domain->manage->account');
		
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	// Our page details
	define("PAGE_Title", 		"Manage Account");
	define("PAGE_Description", 	"");
	
	// Start our template design
	StartPage();
	
	// Our server
	global $obBaseApp;
	
	$existsPDomain 	= true;
	$existsPUser 	= true;
	$existsPValid 	= false;
	
	if(!empty($_GET['did'])) {
		try 				  { $cDomain = $obBaseApp->Domains->ItemByDBID($_GET['did']); } 
		catch (Exception $ex) { $existsPDomain = false; }
	} else { include("account/parameterNotFound.php"); }
	
	if($existsPDomain) {
		if(!empty($_GET['acid'])) {	
			try 				  { $user = $cDomain->Accounts->ItemByDBID($_GET['acid']); } 
			catch (Exception $ex) { $existsPUser = false; }
		} else { include("account/parameterNotFound.php"); }
	}
	
	$existsPValid = ($existsPDomain & $existsPUser);
	if($existsPValid) {
		\Design\Navbar\Get::SetCurrent('dom_man_acc-'. $_GET['did']. '-'. $_GET['acid']);
		
		include("account/validUser.php");
	} else {
		if(!$existsPDomain) 
			 include("account/invalidDomain.php");
		else include("account/invalidAccount.php");
	}

	// End our page
	EndPage();