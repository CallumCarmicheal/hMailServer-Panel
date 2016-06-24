<?php 
	global $PAGE_CALL;
	if(!isset($PAGE_CALL) && empty($PAGE_CALL)) {
		header("HTTP/1.0 404 Not Found");
		die("");
	} else if($PAGE_CALL != "login.php") {
		header("HTTP/1.0 404 Not Found");
		die("");
	}
	
	global $config_about;	
	$title = $config_about['title'];
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?=$title?> Login Page</title>
		<!-- Bootstrap -->
		<link href="res/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="res/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="res/vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- Animate.css -->
		<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
		<!-- Custom Theme Style -->
		<link href="res/build/css/custom.min.css" rel="stylesheet">
	</head>
	<body class="login">
		<div>
			<a class="hiddenanchor" id="signup"></a>
			<a class="hiddenanchor" id="signin"></a>
			<div class="login_wrapper">
				<div class="animate form login_form">
			<?php  if(!empty($_GET['errid'])): 
						$errorID = $_GET['errid'];
						
						if($errorID == "1"): ?>
						<div class="alert alert-error alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<strong>Attention!</strong> The creditentials you supplied were invalid!
						</div>
			<?php		endif;
					
					endif; ?>
				
					<section class="login_content">
						<form action="login_exec.php" method="post" id="loginForm">
							<h1>Login</h1>
							 
							<div> <input type="text" 	 name="username" class="form-control" placeholder="Username" required="" /> </div>
							<div> <input type="password" name="password" class="form-control" placeholder="Password" required="" /> </div>
							<div> <a onclick="document.getElementById('loginForm').submit();" class="btn btn-default submit" type="button" style="width: 100%;">Log in</a> </div>
							<br>
							
							<div class="clearfix"></div>
							<div class="separator">
								<div> 
									<h1><i class="<?=$config_about['icon']?>"></i> <?=$config_about['name']?></h1>
									<p><?=$config_about['footer']?></p>
								</div>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>