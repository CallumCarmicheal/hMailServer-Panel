<?php

	/**
	 * @author 			Callum Carmicheal
	 * @date			24/06/2016 05:05, 05/08/2016 21:26
	 * @description		Handles the connection from and to the COM Object for HMailServer
	 * @updates
	 */

	namespace Base;

	class ComObj {

		public static function CreateDefines() {
			/* Status */ {
				define("HMS_ST_SMTP", 1);
				define("HMS_ST_POP3", 3);
				define("HMS_ST_IMAP", 5);
			}
		}

		public static function Init() {
			global $obBaseApp;  global $_SESSION;
			global $obLanguage; global $hmail_config;

			$requiredVersion = "5.6.4-B2283";

			// Connect to hMailServer
			// Attempt a COM Connection
			try {
				$obBaseApp = new \COM("hMailServer.Application", NULL, CP_UTF8);
			} catch(Exception $e) {
				ob_get_clean();
				echo $e->getMessage();
				echo "<br>";
				echo "This problem is often caused by DCOM permissions not being set.";
				die;
			}

			// Check version
			if ($obBaseApp->Version != $requiredVersion) {
				ob_get_clean();
				echo "<br>";
				echo "The hMailServer version does not match the WebAdmin version.<br>";
				echo "hMailServer version: " . $obBaseApp->Version . "<br>";
				echo "WebAdmin version: " . $requiredVersion . "<br>";
				echo "Please make sure you are using the PHPWebAdmin version which came with your hMailServer installation.<br>";
				echo "<br>";
				echo "<br>";
				echo "This can be bypassed but at the expense of full compatability support. <br>";
				echo "To do this, please edit the ComObj.php file, and chance the variable ". "$". "requiredVersion.";
				echo "Change the value to: ". $obBaseApp->Version;
				die;
			}

			try {
				$obBaseApp->Connect();

				if (isset($_SESSION['hMS']['session_username']) &&
					isset($_SESSION['hMS']['session_password'])) {
					// Authenticate the user
					$obBaseApp->Authenticate($_SESSION['hMS']['session_username'], $_SESSION['hMS']['session_password']);
					$obLanguage = $obBaseApp->GlobalObjects->Languages->ItemByName($hmail_config['defaultlanguage']);
				}
			} catch(Exception $e) {
				echo $e->getMessage();
				die;

				// For after debugging
				// index.php?errid=1
			}

			self::CreateDefines();
		}
	}
