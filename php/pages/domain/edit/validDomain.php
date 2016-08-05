<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		
		define('PAGE_CURRENT_SUB', 'domain->edit');
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT_SUB) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	global $cDomain;
?>

TODO: Domain Editor