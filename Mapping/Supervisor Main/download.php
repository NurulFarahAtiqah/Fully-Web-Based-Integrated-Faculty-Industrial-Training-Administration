<?php
include("../Connections/Connection.php");

if(isset($_GET['dow']))
{ 
	$path = $_GET['dow'];
	
	$res = mysql_query("Select * From pdf WHERE path = '$path'");
	
	header('Content-Type : application/octet-stream');
	header('Content-Disposition: attachment; filename = "'.basename($path).'"');
	header('Content-Length: ' .filesize($path));
	readfile($path);
	
}




?>