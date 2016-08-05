<?php
	
	/**
	 * @author 			Callum Carmicheal
	 * @date			21/06/2016 02:06
	 * @description		A simple 2 command to do everything as for the base template!
	 * @updates			
	 */
	 
	namespace Design\Template;
	
	class Standard {
		public static function Start() { 
			global $config_about;
		
			$outputBuffer = "";
			$outputBuffer .= '<div class="container body"> <div class="main_container"> <div class="col-md-3 left_col"> <div class="left_col scroll-view">'; {
				
				/* Navbar Title with ICON */ {
					$outputBuffer .= '<div class="navbar nav_title" style="border: 0;"> <a href="index.html" class="site_title"><i class="'. $config_about['icon']. '"></i> <span>'. $config_about['name']. '</span></a> </div>';
				}
				
				$outputBuffer .= '<br> <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">'; {
					// Generate Navbar
					
					/* SIMPLE HARDCODED */ {	
						$outputBuffer .= '<div class="menu_section">';
							$outputBuffer .= '<ul style="padding-top: 35px;" class="nav side-menu">';
								/*$outputBuffer .= '<li>';
									$outputBuffer .= '<a href="javascript:void(0)"><i class="fa fa-info-circle"></i> Status </a>';
								$outputBuffer .= '</li>';
								
								$outputBuffer .= '<li>';
									$outputBuffer .= '<a><i class="fa fa-globe"></i> Domains <span class="fa fa-chevron-down"></span></a>';
									$outputBuffer .= '<ul class="nav child_menu">';
										$outputBuffer .= '<li>';
											$outputBuffer .= '<a><i class="fa fa-server"></i>127.0.0.1<span class="fa fa-chevron-down"></span></a>';
											$outputBuffer .= '<ul class="nav child_menu">';
												$outputBuffer .= '<li>';
													$outputBuffer .= '<a href="#"><i class="fa fa-folder"></i>Accounts <span class="label pull-right">0</span></a>';
												$outputBuffer .= '</li>';
												
												$outputBuffer .= '<li>';
													$outputBuffer .= '<a href="#"><i class="fa fa-folder"></i>Aliases <span class="label pull-right">0</span></a>';
												$outputBuffer .= '</li>';
												
												$outputBuffer .= '<li>';
													$outputBuffer .= '<a href="#"><i class="fa fa-folder"></i>Dist lists <span class="label pull-right">0</span></a>';
												$outputBuffer .= '</li>';
											$outputBuffer .= '</ul>';
										$outputBuffer .= '</li>';
										
										
									$outputBuffer .= '</ul>';
								$outputBuffer .= '</li>';
								
								
								$outputBuffer .= '<li>';
									$outputBuffer .= '<a href="javascript:void(0)"><i class="fa fa-folder"></i> Rules </a>';
								$outputBuffer .= '</li>';
								
								$outputBuffer .= '<li>';
									$outputBuffer .= '<a href="javascript:void(0)"><i class="fa fa-cog"></i> Settings </a>';
								$outputBuffer .= '</li>';
								
								$outputBuffer .= '<li>';
									$outputBuffer .= '<a href="javascript:void(0)"><i class="fa fa-cogs"></i> Utilities </a>';
								$outputBuffer .= '</li>'; //*/
								
								$outputBuffer .= \Design\Navbar\Get::getNavBar();
								
							$outputBuffer .= '</ul>';
					
						$outputBuffer .= '</div>';
					} $outputBuffer .= '</div>';
				
					
					/* Navbar Buttons */ {
						$outputBuffer .= trim('
							<div class="sidebar-footer hidden-small">
								<a data-toggle="tooltip" data-placement="top" title="Settings">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="FullScreen">
								<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="Lock">
								<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
									<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
								</a>
						</div>');
					}
					
					
				// ! menu_section
				} $outputBuffer .= "<div>";
			} $outputBuffer .= '</div></div></div>';
			
			
			// Top Nav
			$outputBuffer .= '<div class="top_nav"><div class="nav_menu"><nav class="" role="navigation">'; {
				// Toggle menu
				$outputBuffer .= '<div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>';
			
				// The top-menu items
				$outputBuffer .= '<ul class="nav navbar-nav navbar-right">'; {
				
					if(\Auth\User::LoggedIn()) {
						// $config_about['user-image'];
						// \Auth\User::GetUsername();
					
						// User dropdown
						$outputBuffer .= '<li class="">'; {
							$outputBuffer .= '<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
								$outputBuffer .= '<img src="'. $config_about['user-image']. '" alt="">'. \Auth\User::GetUsername(). '<span class=" fa fa-angle-down"></span>';
							$outputBuffer .= '</a>';
							
							$outputBuffer .= '<ul class="dropdown-menu dropdown-usermenu pull-right">';
								$outputBuffer .= '<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>';
							$outputBuffer .= '</ul>';
						} $outputBuffer .= '</li>';
					} else {
						// Hmm what to do here
					}
				} $outputBuffer .= '</ul>';
			} $outputBuffer .= '</nav></div></div>';
			
			$outputBuffer .= '<div class="right_col" role="main">';
			
			return $outputBuffer;
		}
		
		
		public static function End() {
			global $config_about;
			
			// class = "right_col"
			$outputBuffer = "<br></div>";
		
			// Footer
			$outputBuffer .= '<footer><div class="pull-right">';
				$outputBuffer .= $config_about['footer'];
			$outputBuffer .= '</div><div class="clearfix"></div></footer>';
			
			$outputBuffer .= '';
		
			return $outputBuffer. "</div></div></div>";
		}
	}