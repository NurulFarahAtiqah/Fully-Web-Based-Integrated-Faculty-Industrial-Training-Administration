<?php
 include("../Connections/Check.php");
$id=$_REQUEST['Stud_AttachmentID'];
$query = "DELETE FROM stud_attachment WHERE Stud_AttachmentID=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: View_SA2017.php"); 
?>