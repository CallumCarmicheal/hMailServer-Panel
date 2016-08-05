<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		define('PAGE_CURRENT', 'PAGE_NAME');
		
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	// Our page details
	define("PAGE_Title", 		"");
	define("PAGE_Description", 	"");
	
	// Start our template design
	StartPage();
	
	// Our server
	global $obBaseApp;
?>



<?php 
	// End our page
	EndPage();
?>