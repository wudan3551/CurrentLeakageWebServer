<?php
	//connect database
	$con = mysql_connect("localhost","root","382395");
	//confirm connection
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	//select databse
	mysql_select_db("gprs",$con) or die(mysql_error());
	
	//fetch result
	$result = mysql_query("SELECT * FROM demo");

	//display results
	while($row = mysql_fetch_array($result))
	{
		echo $row['d'] . " " . $row['t'];
		echo "<br />";//line feed
	}
	//close connection
	mysql_close($con);
?>
