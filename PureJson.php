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
	$d = $_REQUEST['dateData'];
	$t = $_REQUEST['timeData'];
	$query_statement = "SELECT * FROM demo where d=";
	$query_statement .= "\"" . $d . "\"";
	if($t != "HO"){
		if($t == "AM")$query_statement .= "and t between " . "\"" . "00:00:00" . "\"" . " and " . "\"" . "12:00:00" . "\"";
		if($t == "PM")$query_statement .= "and t between " . "\"" . "12:00:00" . "\"" . " and " . "\"" . "18:00:00" . "\"";
		if($t == "NT")$query_statement .= "and t between " . "\"" . "18:00:00" . "\"" . " and " . "\"" . "23:59:59" . "\"";
	}

	//echo $query_statement;//for debug

	//fetch result
	$result = mysql_query($query_statement);

	$res = array();
	//display results
	while($row = mysql_fetch_object($result))
	{
		array_push($res,$row);
		//echo $row['d'] . " " . $row['t'];
		//echo "<br />";//line feed
		//echo json_encode(Array('obj'=>$row));
		//$i++;
	}
	//$dan = json_encode($res);
	
	//return data in json format
	echo json_encode($res);
		
	//$de = json_decode($dan);

	//print $de[0]->{'t'};
	//close connection
	mysql_close($con);
?>
