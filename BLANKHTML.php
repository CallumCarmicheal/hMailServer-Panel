<?php
	// Include everything
	require("include.everything.php");
	
	// TODO::FIGURE OUT AUTH
	//		Keep the same as the phpWebAdmin or make my own storage
	
	define("PAGE_Title", 		"Generated");
	define("PAGE_Description", 	"Test");
	
	// THIS MUST ALLWAYS HAPPEN
	// EVERYTHING ELSE IS OPTIONAL
	Base\Page::StartPage();
	Base\Page::AutoAuthRedirect();
	
	
	
	echo Design\HTML\Framework::StartHTML();
	echo Design\HTML\References::GetHead();
	echo Design\HTML\Framework::StartBody();
	echo Design\Template\Standard::Start();
?>

	<h1> I am HTML! </h1>

<?php 
	echo Design\Template\Standard::End();
	echo Design\HTML\References::GetScripts();

	echo Design\HTML\Framework::EndBody();
	echo Design\HTML\Framework::EndHTML();
	
	Base\Page::EndPage();
?>