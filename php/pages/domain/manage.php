<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		define('PAGE_CURRENT', 'domain->manage');
		
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
	
	// Our page details
	define("PAGE_Title", 		"Domains");
	define("PAGE_Description", 	"Manage hMS domains");
	
	// Start our template design
	StartPage();
	\Design\Navbar\Get::SetCurrent('dom_man');
	
	// Our server
	global $obBaseApp;
	
?>

<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Domains <small>manage</small></h3>
		</div>

		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<!-- TODO: Add jquery here! -->
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Domains</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p>Simple table with project listing with progress and editing options</p>

					<!-- start project list -->
					<table class="table table-striped projects">
						<thead>
							<tr>
								<th>Domain</th>
								<th>Email</th>
								<th>Aliases</th>
								<th>DBLists</th>
								<th style="width: 50%">Disk Space (Used)</th>
								<th>Active</th>
								<th style="width: 200px">Options</th>
							</tr>
						</thead>
						<tbody>

				<?php   $obDomains = $obBaseApp->Domains;
						for ($i = 0; $i < $obDomains->Count; $i++) {
							$domain = $obDomains[$i]; ?>
							
							<tr>
								<td>
									<a><?=$domain->Name?></a> <br>
									<small>ID: <?=$domain->ID?></small>
								</td>
								
								<td> <a><?=$domain->Accounts->Count?></a> 			<br> <small>Accounts</small> </td>
								<td> <a><?=$domain->Aliases->Count?></a> 			<br> <small>Aliases</small> </td>
								<td> <a><?=$domain->DistributionLists->Count?></a> 	<br> <small>DBLists</small> </td>
								
								<td class="project_progress">
									<?php 
										// Calculate percentage
										$cur = $domain->Size;
										$max = $domain->AllocatedSize;
										if($cur == 0 || $max == 0)
											 $per = 0;
										else $per = $cur/$max*100;
										$per = round($per, 2);
									?>
								
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$per?>" style="width: 57%;" aria-valuenow="56"></div>
									</div> <small><?=$per?>% Used | <?=$cur?> / <?=$max?> - MB</small>
								</td>
						  <?php if($domain->Active) { ?> <td> <button did="<?=$domain->ID?>" type="button" class="btn btn-success btn-xs">Yes</button> </td> <?php
								} else { ?>				 <td> <button did="<?=$domain->ID?>" type="button" class="btn btn-danger btn-xs">No</button> </td> <?php } ?>

								<td>
									<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i></a>
									<a href="pages.php?page=domain->edit&did=<?=$domain->ID?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
				<?php	}
					?>
							
						</tbody>
					</table>
					<!-- end project list -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	// End our page
	EndPage();
?>