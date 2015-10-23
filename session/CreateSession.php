<?php
	session_start();
	$_SESSION["username"] = "dan";
	$_SESSION["password"] = "382395";

	echo "username is : " . $_SESSION["username"] . "\n";
	echo "password is : " . $_SESSION["password"] . "\n";
	//note : this session will keep valid until client close web browser
?>
