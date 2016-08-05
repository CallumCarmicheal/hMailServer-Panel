<?php 
	
	function Gravatar($email, $size = 224, $fallback="https://www.gravatar.com/avatar/2e629e2c14ee06cf4d546a4a0c1dfe4c?s=224") {
		$default = $fallback;
		return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
	}