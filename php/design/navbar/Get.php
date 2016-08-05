<?php

	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 01:48, 24/06/2016 04:17
	 * @description		The file that just does <html>, yeah i know its the most important one yet!
	 * @updates
	 */

	namespace Design\Navbar;

	class Get {

		public static function SetCurrent($page) {
			echo '<script>window.location.hash = "#'. $page. '";</script>';
		}

		public static function NavBar_IterateChild($child) {
			$ob = '';
				$containsChildren 	= !empty($child['sub']);
				$hasIcon			= !empty($child['icon']);
				$hasLocation		= $containsChildren ? false : !empty($child['location']);
				$hasLabel			= array_key_exists("label", $child); //(isset($child['label']) || $child['label']==="0" || $child['label']);
				$displayChild		= !empty($child['displayChild']) ? $child['displayChild'] : false;
				$hasRedirect		= !empty($child['link']) ? $child['link'] : false;

				$linkLabel			= "";
				if(!$containsChildren)
								  $linkLabel = 'href="#hidden"';
				if ($hasLocation) $linkLabel = 'href="'. $child['location']. '"';

				$ob .= "<li>";
					$ob .= '<a '. $linkLabel. ' '. ($hasRedirect ? 'onclick="window.location='. "'". $child['link']. "'". '"' : ''). '>';
						if($hasIcon) 		  $ob .= '<i class="'. $child["icon"]. '"></i>';
						$ob .= $child['name'];
						if($hasLabel)
							$ob .= '<span class="label pull-right">'. ($child['label'] == -1 ? "0" : $child['label']). '</span>';

						if($containsChildren) $ob .= '<span class="fa fa-chevron-down"></span>';
					$ob .= '</a>';

					if($containsChildren) {
						$ob .= '<ul class="nav child_menu"'. (!$displayChild ? ' style="display: none;"' : ""). '>' ;
							if(!empty($child['sub'])) {
								foreach($child['sub'] as &$value)
									$ob .= self::NavBar_IterateChild($value);
								unset($value);
							}
						$ob .= '</ul>';
					}
				$ob .= "</li>";
			return $ob;
		}

		// Note this is just temporal!
		public static function getNavBar() {
			global $obBaseApp;
			global $config_function;

			$tempLog = "";

			$globalMenu = array();

			$menuStatus = array (
				'name' 		=> 'Dashboard',
				'icon' 		=> 'fa fa-info-circle',
				'location' 	=> '#dashboard',
				'link'		=> 'pages.php?page=dashboard',
				'root' 		=> true
			); $globalMenu[] = $menuStatus;

			$menuDomains = array (
				'name' => 'Domains',
				'icon' => 'fa fa-globe',
				'root' => true,
				'sub'  => array()
			); {
				$obDomains = $obBaseApp->Domains;

				$manuDomainsMan = array (
					'name'  	=> 'Manage Domains',
					'location' 	=> '#dom_man',
					'link'  	=> 'pages.php?page=domain->manage',
					'label' 	=> ''. $obDomains->Count
				); $menuDomains['sub'][] = $manuDomainsMan;

				for ($i = 0; $i < $obDomains->Count; $i++) {
					$domain = $obDomains[$i];

					// Menu Base
					$base = array(
						'name' => $domain->Name,
						//'icon' => 'fa fa-server', // OPTIONAL: Icon next to the server!
						'sub'  => array()
					);

					// Create a link to manage domain
					$mAccounts = array (
						'name' 		=> 'Manage',
						'location' 	=> '#dom_man_man-'. $domain->ID
					); $base['sub'][] = $mAccounts;

					// Create a link to manage accounts
					$mAccounts = array (
						'name' 		=> 'Accounts',
						'location' 	=> '#dom_man_acc-'. $domain->ID,
						'label'		=> ''. $domain->Accounts->Count
					); $base['sub'][] = $mAccounts;

					// Create our Aliases link
					$mAliases = array (
						'name' 		=> 'Aliases',
						'location' 	=> '#dom_man_ali-'. $domain->ID,
						'label'		=> ''. $domain->Aliases->Count
					); $base['sub'][] = $mAliases;

					// Create our Distribution Lists link
					$mDist = array (
						'name' 		=> 'Distribution Lists',
						'location' 	=> '#dom_man_dist-'. $domain->ID,
						'label'		=> ''. $domain->DistributionLists->Count
					); $base['sub'][] = $mDist;

					// Display our accounts on the sidebar if setting is on
					if($config_function['autoload-accounts']) {
						$mAccountsL = array (
							'name' 		=> 'Account Lists',
							'sub'		=> array()
						);

						for ($x = 0; $x < $domain->Accounts->Count; $x++) {
							$account = $domain->Accounts[$x];

							$tmpItem = array (
								'name' 	=> explode("@", $account->Address)[0],
								'location' 	=> '#dom_man_acc-'. $domain->ID. '-'. $account->ID,
								'link' 	=> "pages.php?page=domain->manage->account&did=". $domain->ID. "&acid=". $account->ID
							); $mAccountsL['sub'][] = $tmpItem;
						}

						$base['sub'][] = $mAccountsL;
					}

					// Add the domain
					$menuDomains['sub'][] = $base;
					$tempLog .= "Added ". $domain->Name. "<br>";
				}
			} $globalMenu[] = $menuDomains;

			$menuRules = array (
				'name' => 'Rules',
				'icon' => 'fa fa-folder',
				'link' => \Base\Page::GenerateLink("rules"),
				'root' => true
			); $globalMenu[] = $menuRules;

			$menuSettings = array (
				'name' => 'Settings',
				'icon' => 'fa fa-cog',
				'link' => \Base\Page::GenerateLink("setts"),
				'root' => true
			); $globalMenu[] = $menuSettings;

			$menuUtilities = array (
				'name' => 'Utilities',
				'icon' => 'fa fa-cogs',
				'link' => \Base\Page::GenerateLink("util"),
				'root' => true
			); $globalMenu[] = $menuUtilities;

			$outputBuffer = "";
			foreach($globalMenu as &$item)
				$outputBuffer .= self::NavBar_IterateChild($item);

			/*/
			ob_get_clean();
			echo "<br><br>";
				echo $tempLog;
			echo "<br><br>";
				echo "<pre>";
					echo htmlspecialchars($outputBuffer, ENT_QUOTES);
				echo "</pre>";
			echo "<br><br>";
				echo "<pre>";
					var_dump($globalMenu);
				echo "</pre>";
			exit; //*/

			unset ($tempLog);
			return $outputBuffer;
		}
	}
