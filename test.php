<?php

	require("include.everything.php");
	
	Base\Page::StartPage();
	Base\Page::AutoAuthRedirect();
	
	global $obBaseApp;
	
	global $currentPage;
	
	/*$obDomains = $obBaseApp->Domains;
	for ($i = 0; $i < $obDomains->Count; $i++) {
		$domain = $obDomains[$i];
		echo "Domain: ". $domain->Name. "<br>";
	}//*/
	
	echo "<pre>";
		var_dump($_GET);
	echo "</pre>";