<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		define('PAGE_CURRENT', 'domain->edit');
		
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	
	// Our page details
	define("PAGE_Title", 		"Manage Domain");
	define("PAGE_Description", 	"");
	
	// Start our template design
	StartPage();
	
	// Our server
	global $obBaseApp;
	$existsPDomain 	= true;
	
	if(!empty($_GET['did'])) {
		try 				  { $cDomain = $obBaseApp->Domains->ItemByDBID($_GET['did']); } 
		catch (Exception $ex) { $existsPDomain = false; }
	} else { include("edit/parameterNotFound.php"); }
	
	if($existsPDomain) {
		\Design\Navbar\Get::SetCurrent('dom_edit-'. $_GET['did']);
		
		include("edit/validDomain.php");
	} else {
		include("edit/invalidDomain.php");
	}

	// End our page
	EndPage();