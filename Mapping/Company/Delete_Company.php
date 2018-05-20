<?php
 include("../Connections/Check.php");
$id=$_REQUEST['Company_Id'];
$query = "DELETE FROM company WHERE Company_Id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: View_CompanyALL.php"); 
?>