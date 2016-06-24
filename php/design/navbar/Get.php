<?php
	
	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 01:48, 24/06/2016 04:17
	 * @description		The file that just does <html>, yeah i know its the most important one yet!
	 * @updates			
	 */
	 
	namespace Design\Navbar;
	
	class Get {
	
		public static function NavBar_IterateChild($child) {		
			$ob = '';
				$containsChildren 	= !empty($child['sub']);
				$hasIcon			= !empty($child['icon']);
				$hasLink			= $containsChildren ? false : !empty($child['link']);
				$hasLabel			= !empty($child['label']);
				
				$linkLabel			= "";
				if(!$containsChildren) 
								   $linkLabel = 'href="#"';
				if ($hasLink) $linkLabel = 'href="'. $child['link']. '"';
				
				$ob .= "<li>";
					$ob .= '<a '. $linkLabel. '>';
						if($hasIcon) 		  $ob .= '<i class="'. $child["icon"]. '"></i>';
						$ob .= $child['name'];
						
						if($hasLabel) 
							$ob .= '<span class="label pull-right">'. $child['label']. '</span>';
						
						if($containsChildren) $ob .= '<span class="fa fa-chevron-down"></span>';
					$ob .= '</a>';
					
					if($containsChildren) {
						$ob .= '<ul class="nav child_menu">';
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
		
			$globalMenu = array();
		
			$menuStatus = array (
				'name' => 'Status',
				'icon' => 'fa fa-info-circle',
				'link' => '#',
				'root' => true
			); $globalMenu[] = $menuStatus;
			
			$menuDomains = array (
				'name' => 'Domains',
				'icon' => 'fa fa-globe',
				'root' => true,
				'sub'  => array()
			); {
				$obDomains = $obBaseApp->Domains;
				for ($i = 0; $i < $obDomains->Count; $i++) {
					$domain = $obDomains[$i];
				  
					$base = array(
						'name' => $domain->Name,
						'icon' => 'fa fa-server',
						'sub'  => array()
					);
					
					$mAccounts = array (
						'name' 		=> 'Accounts',
						'icon'		=> 'fa fa-folder',
						'label'		=> $domain->Accounts->Count,
						'link'		=> \Base\Page::GenerateLink("dom_acc", array('did' => $domain->ID))
					); $base['sub'][] = $mAccounts;
					
					if($config_function['autoload-accounts']) {
						$mAccountsL = array (
							'name' 		=> 'Account List',
							'icon'		=> 'fa fa-folder',
							'sub'		=> array()
						);
						
						for ($i = 0; $i < $domain->Accounts->Count; $i++) {
							$account = $domain->Accounts[$i];
							
							$tmpItem = array (
								'name' 	=> $account->Address,
								'link' 	=> "domains_manage.php?did=". $domain->ID. "&acid=". $account->ID
							); 
							
							$mAccountsL['sub'][] = $tmpItem;
						} 
						
						$base['sub'][] = $mAccountsL;
					} 
					
					$mAliases = array (
						'name' 		=> 'Aliases',
						'icon'		=> 'fa fa-folder',
						'label'		=> $domain->Aliases->Count,
						'link'		=> \Base\Page::GenerateLink("dom_alias", array('did' => $domain->ID))
					); $base['sub'][] = $mAliases;
					
					$mDist = array (
						'name' 		=> 'Distribution',
						'icon'		=> 'fa fa-folder',
						'label'		=> $domain->DistributionLists->Count,
						'link'		=> \Base\Page::GenerateLink("dom_dist", array('did' => $domain->ID))
					); $base['sub'][] = $mDist;
					$menuDomains['sub'][] = $base;
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
			echo "<pre>";
				echo htmlspecialchars($outputBuffer, ENT_QUOTES);
			echo "</pre>";
				
			echo "<pre>";
				print_r($globalMenu);
			echo "</pre>";
			exit; //*/
			
			return $outputBuffer;
		}
	}