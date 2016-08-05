<?php
	/* Test if the current page is called or loaded */ {
		global $currentPageRAW;
		
		define('PAGE_CURRENT_SUB', 'domain->manage->account');
		// Called not loaded
		if($currentPageRAW != PAGE_CURRENT_SUB) {
			header("location: index.php");
			die("redirecting to index.php");
		}
	}
?>
	
<!-- page content -->
<div class="col-md-12">
	<div class="col-middle">
		<div class="text-center text-center">
			<h1 class="error-number">400</h1>
			<h2>The requested parameters has incorrect syntax</h2>
			<p>The request is invalid. <a href="#">Report this?</a></p>
		
			<div class="mid_center"><?=$currentPageRAW?></div>
		</div>
	</div>
</div>