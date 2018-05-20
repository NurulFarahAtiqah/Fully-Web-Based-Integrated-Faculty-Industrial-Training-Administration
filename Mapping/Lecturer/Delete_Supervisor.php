<?php
 include("../Connections/Check.php");
$id=$_REQUEST['Supervisor_Id'];
$query = "DELETE FROM supervisor WHERE Supervisor_Id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: View_Supervisor.php"); 
?>