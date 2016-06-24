<?php
	
	// Create our configuration array
	global $config_function;
	$config_function = array();
	
	/* 
	 * Option Name: autoload-accounts
	 * Description: This displays every account in the menu bar, WARNING
	 *				this may cause a really long delay on page loads if there
	 *				is alot of users in each domain!
	 * Default: true
	 * Outputs: Every account under each domain
 	 */
	$config_function['autoload-accounts'] = true;