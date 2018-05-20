<?php
 include("../Connections/Check.php");
$id=$_REQUEST['Student_Id'];
$query = "DELETE FROM student WHERE Student_Id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: View_Student.php"); 
?>