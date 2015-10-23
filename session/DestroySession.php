<?php
	session_start();	
	//remove all session variable
	session_unset();

	//destroy the session
	session_destroy();

?>
