<?php
	
	// Create our configuration array
	global $config_about;
	$config_about = array();
	
	/* 
	 * Option Name: title
	 * Description: This is the title prepended to every webpage
	 * Default: hMailServer WebAdmin - 
	 * Example: 
	 *		WebAdmin - 
	 *		WebAdmin | 
	 * Outputs: WebAdmin - {page}
 	 */
	$config_about['title'] = "WebAdmin - ";
	
	/* 
	 * Option Name: name
	 * Description: This is the name used to identify the website in the login page and the Sidebar (EG. Company Name)
	 * Default: hMailServer
	 * Example: GEWGL 
 	 */
	$config_about['name'] = "hMailServer";
	
	/* 
	 * Option Name: admin-email
	 * Description: this is the admin email displayed to the user for support and contacting incase of issues!
	 * Default: admin@domain.com
	 * Example: admin@domain.com
 	 */
	$config_about['admin-email'] = "admin@domain.com";
	
	/* 
	 * Option Name: icon
	 * Description: This is the icon that is used in the login page and header, it is a AwesomeFont icon
	 * Default: fa fa-paw
 	 */
	$config_about['icon'] = "fa fa-envelope";
	
	/* 
	 * Option Name: footer
	 * Description: This is html that will be placed inside the footer(s)
	 * Default: hMailServer - Admin by <a href="http://callumcarmicheal.com">Callum Carmicheal</a><br>Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
 	 */
	$config_about['footer'] = 'hMailServer - Admin by <a href="http://callumcarmicheal.com">Callum Carmicheal</a><br>Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>';
	
	/* 
	 * Option Name: user-image
	 * Description: The image used as the users photograph (please note this is for all users so use a company image)
	 *				Resolution is 128x128
	 * Default: hMailServer - Admin by <a href="http://callumcarmicheal.com">Callum Carmicheal</a><br>Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
 	 */
	$config_about['user-image'] = 'images/img.jpg';