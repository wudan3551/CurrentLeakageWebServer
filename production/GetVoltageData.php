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
	$d = $_REQUEST['SelectDate'];
	$query_statement = "SELECT voltage,DATE_FORMAT(t,'%H:%i') as t FROM VoltageMonitor where d=" . '"' . $d . '"' . "ORDER BY t";
	//echo $query_statement;

	//fetch result
	$result = mysql_query($query_statement);

	//display results
	$theData = array();
	while ($row = mysql_fetch_object($result)) {
		array_push($theData,$row);
	}

	/* For empty data case */
	if(sizeof($theData) <= 0) {
		for($i = 0;$i < 24;++$i){
			if($i >= 10)$temp = array("voltage" => "0","t" => ($i . ":00"));
			else $temp = array("voltage" => "0","t" => ("0" . $i . ":00"));
			array_push($theData,$temp);
		}
	}
	//return data in json format
	echo json_encode($theData);

	//close connection
	mysql_close($con);
?>
