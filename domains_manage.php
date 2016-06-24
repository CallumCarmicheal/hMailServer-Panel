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
	
	global $obBaseApp;
	
	$cDomain = $obBaseApp->Domains->ItemByDBID($_GET['did']);
	$user	 = $cDomain->Accounts->ItemByDBID($_GET['acid']);
	
	$email = $user->Address;
	$default = "https://www.gravatar.com/avatar/2e629e2c14ee06cf4d546a4a0c1dfe4c?d=callumcarmicheal%40gmail.com&s=224";
	$size = 224;
	$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

?>
	
<div class="col-md-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Domain - Manage Account <small><?=$user->Address?></small></h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Settings 1</a></li>
						<li><a href="#">Settings 2</a></li>
					</ul>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content" style="display: block;">
			<div class="col-xs-3">
				<!-- required for floating -->
				<!-- Nav tabs -->
				<ul class="nav nav-tabs tabs-left">
					<li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Statistics</a></li>
					<li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Auto-Reply</a></li>
					<li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Forwarding Options</a></li>
					<li><a href="#profile" data-toggle="tab">Signature</a></li>
					<li><a href="#profile" data-toggle="tab">Active Directory</a></li>
					<li><a href="#profile" data-toggle="tab">Rules</a></li>
					<li><a href="#profile" data-toggle="tab">Advanced</a></li>
				</ul>
			</div>
			<div class="col-xs-9">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<div class="col-md-12">
							<div class="col-md-10">
								<h3><?=$user->Address?></h3>
								<ul class="list-unstyled user_data">
									<div class="row tile_count">
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-user"></i> Size</span>
											<div class="count"><?=$user->Size;?></div>
											<span class="count_bottom"><i class="yellow">0% </i> From last Week</span>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-clock-o"></i> Max Size</span>
											<div class="count"><?=$user->MaxSize?></div>
											<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-clock-o"></i> Quota Used</span>
											<div class="count"><?=$user->QuotaUsed?>%</div>
											<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-user"></i> SMTP Sessions</span>
											<div class="count"><?=$obBaseApp->Status->SessionCount(STSMTP);?></div>
											<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-desc"></i>0% </i> From last Week</span>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-user"></i> POP3 Sessions</span>
											<div class="count"><?=$obBaseApp->Status->SessionCount(STPOP3);?></div>
											<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
											<span class="count_top"><i class="fa fa-user"></i> IMAP Sessions</span>
											<div class="count"><?=$obBaseApp->Status->SessionCount(STIMAP);?></div>
											<span class="count_bottom"><i class="yellow"><i class="fa fa-sort-asc"></i>0% </i> From last Week</span>
										</div>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="profile">Profile Tab.</div>
					<div class="tab-pane fade" id="messages">Messages Tab.</div>
					<div class="tab-pane fade" id="settings">Settings Tab.</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<?php 
	echo Design\Template\Standard::End();
	echo Design\HTML\References::GetScripts();

	echo Design\HTML\Framework::EndBody();
	echo Design\HTML\Framework::EndHTML();
	
	Base\Page::EndPage();
?>