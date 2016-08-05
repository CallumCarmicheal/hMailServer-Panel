<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		define('PAGE_CURRENT', 'dashboard');
		
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	// Our page details
	define("PAGE_Title", 		"Dashboard");
	define("PAGE_Description", 	"Just a dashboard!");
	
	// Start our template design
	StartPage();
	
	// Our server
	global $obBaseApp;
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
		<div class="count"><?=$obBaseApp->Status->SessionCount(HMS_ST_SMTP);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-desc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> POP3 Sessions</span>
		<div class="count"><?=$obBaseApp->Status->SessionCount(HMS_ST_POP3);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> IMAP Sessions</span>
		<div class="count"><?=$obBaseApp->Status->SessionCount(HMS_ST_IMAP);?></div>
		<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
	</div>
</div>

<?php 
	//Design\Navbar\Get::SetCurrent("dashboard");

	// End our page
	EndPage();
?>