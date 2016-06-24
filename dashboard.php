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
	
	global $obBaseApp;
	
	define("STSMTP", 1);
	define("STPOP3", 3);
	define("STIMAP", 5);
?>

<div class="row tile_count">
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Processed Messages</span>
		<div class="count"><?=$obBaseApp->Status->ProcessedMessages;?></div>
		<span class="count_bottom"><i class="yellow">0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-clock-o"></i> Viruses detected</span>
		<div class="count"><?=$obBaseApp->Status->RemovedViruses;?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Spam messages</span>
		<div class="count"><?=$obBaseApp->Status->RemovedSpamMessages;?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> SMTP Sessions</span>
		<div class="count"><?=$obBaseApp->Status->SessionCount(STSMTP);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-desc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> POP3 Sessions</span>
		<div class="count"><?=$obBaseApp->Status->SessionCount(STPOP3);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> IMAP Sessions</span>
		<div class="count"><?=$obBaseApp->Status->SessionCount(STIMAP);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
</div>

<?php 
	echo Design\Template\Standard::End();
	echo Design\HTML\References::GetScripts();

	echo Design\HTML\Framework::EndBody();
	echo Design\HTML\Framework::EndHTML();
	
	Base\Page::EndPage();
?>