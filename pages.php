<?php
	
	// Start our Session and Redirect on Invalid Login	
	require("include.everything.php");
	Base\Page::StartPage();
	Base\Page::AutoAuthRedirect();
	
	$currentPage 	= "dashboard";
	$currentPageRAW = "";
	if(!empty($_GET['page']))
		$currentPage = $_GET['page'];
	
	$currentPageRAW = $currentPage;
	
	// Remove any trailing attempted exploits
	$currentPage = basename($currentPage).PHP_EOL;
	$currentPage = preg_replace('/\\.[^.\\s]{3,4}$/', '', $currentPage);
	$currentPage = str_replace('->', '/', $currentPage);
	$currentPage = trim($currentPage);
	
	$PagesLocation 	= "php/pages/";
	$ErrorLocations = $PagesLocation. "errors/";
	$PageURI 		= $PagesLocation. $currentPage. ".php";
	
	function StartPage() {
		echo Design\HTML\Framework::StartHTML();
		echo Design\HTML\References::GetHead();
		echo Design\HTML\Framework::StartBody();
		echo Design\Template\Standard::Start();
	} function EndPage() {
		echo Design\Template\Standard::End();
		echo Design\HTML\References::GetScripts();

		echo Design\HTML\Framework::EndBody();
		echo Design\HTML\Framework::EndHTML();
		
		Base\Page::EndPage();
	}
	
	if(file_exists($PageURI)) {
		include($PageURI);
	} else {
		include($ErrorLocations. "404.php");
	}