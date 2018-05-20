<?php
include('../Connections/Connection.php');
session_start();
$user_check=$_SESSION['Company_Id'];
$session = $_SESSION["semsesi"];

$sql = mysqli_query($db,"SELECT * FROM company WHERE Company_Id='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
$login_user=$row['Company_Id'];
$login_name = $row['Company_Name'];
 
if(!isset($user_check))
{
header("Location: ../Main/Main.php");
}
?>