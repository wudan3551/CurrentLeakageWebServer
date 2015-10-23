<?php
if($_REQUEST['dateData'] && $_REQUEST["timeData"]) {
	$temp = "dateData:" . $_REQUEST['dateData'] . "&timeData:" . $_REQUEST['timeData'];
	echo $temp;

}
?>
