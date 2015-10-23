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
	
	//construct query
	$query_statement = "SELECT * FROM RealTimeData order by id";

	//fetch result
	$result = mysql_query($query_statement);

	$res = array();
	//display results
	while($row = mysql_fetch_object($result))
	{
		array_push($res,$row);
	}
	
	//return data in json format
	echo json_encode($res);
		
	//close connection
	mysql_close($con);
?>
