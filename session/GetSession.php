<?php
	session_start();
	if(session_is_registered("username"))echo "username is : " . $_SESSION["username"] . "\n";
	else echo "username not registered!" . "\n";
	if(session_is_registered("password"))echo "password is : " . $_SESSION["password"] . "\n";
	else echo "password not registered!" . "\n";
?>
