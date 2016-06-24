<?php
	
	/**
	 * @author 			Callum Carmicheal
	 * @date			21/06/2016 01:43
	 * @description		This outputs the scripts and css files used for the page
	 * @updates			
	 */
	
	namespace Design\HTML;
	
	class References {
		public static function GetHead() { 
			global $config_about;
			
			$title = $config_about['title'];
			$title .= PAGE_Title;
			
			ob_start(); ?>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					<!-- Meta, title, CSS, favicons, etc. -->
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">

					<title><?=$title?></title>

					<!-- Bootstrap -->
					<link href="res/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
					<!-- Font Awesome -->
					<link href="res/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
					<!-- NProgress -->
					<link href="res/vendors/nprogress/nprogress.css" rel="stylesheet">
					<!-- NProgress -->
					<link href="res/vendors/nprogress/nprogress.css" rel="stylesheet">
					<!-- iCheck -->
					<link href="res/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
					<!-- bootstrap-progressbar -->
					<link href="res/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
					<!-- JQVMap -->
					<link href="res/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
					<!-- Custom Theme Style -->
					<link href="res/build/css/custom.min.css" rel="stylesheet">
				  </head>
		<?php return ob_get_clean(); }
		
		public static function GetScripts() { 
			global $config_about;
			
			ob_start(); ?>
				<!-- jQuery -->
				<script src="res/vendors/jquery/dist/jquery.min.js"></script>
				<!-- Bootstrap -->
				<script src="res/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
				<!-- FastClick -->
				<script src="res/vendors/fastclick/lib/fastclick.js"></script>
				<!-- NProgress -->
				<script src="res/vendors/nprogress/nprogress.js"></script>
				<!-- Chart.js -->
				<script src="res/vendors/Chart.js/dist/Chart.min.js"></script>
				<!-- gauge.js -->
				<script src="res/vendors/gauge.js/dist/gauge.min.js"></script>
				<!-- bootstrap-progressbar -->
				<script src="res/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
				<!-- iCheck -->
				<script src="res/vendors/iCheck/icheck.min.js"></script>
				<!-- Skycons -->
				<script src="res/vendors/skycons/skycons.js"></script>
				<!-- Flot -->
				<script src="res/vendors/Flot/jquery.flot.js"></script>
				<script src="res/vendors/Flot/jquery.flot.pie.js"></script>
				<script src="res/vendors/Flot/jquery.flot.time.js"></script>
				<script src="res/vendors/Flot/jquery.flot.stack.js"></script>
				<script src="res/vendors/Flot/jquery.flot.resize.js"></script>
				<!-- Flot plugins -->
				<script src="js/flot/jquery.flot.orderBars.js"></script>
				<script src="js/flot/date.js"></script>
				<script src="js/flot/jquery.flot.spline.js"></script>
				<script src="js/flot/curvedLines.js"></script>
				<!-- JQVMap -->
				<script src="res/vendors/jqvmap/dist/jquery.vmap.js"></script>
				<script src="res/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
				<script src="res/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
				<!-- bootstrap-daterangepicker -->
				<script src="js/moment/moment.min.js"></script>
				<script src="js/datepicker/daterangepicker.js"></script>

				<!-- Custom Theme Scripts -->
				<script src="res/build/js/custom.min.js"></script>
		<?php return ob_get_clean(); }
	}