<?php
include('../Connections/Connection.php');
session_start();
$user_check=$_SESSION['Student_Matric'];
 
$sql = mysqli_query($db,"SELECT * FROM student WHERE Student_Matric='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
$login_id=$row['Student_Id'];
$login_user=$row['Student_Matric'];
$login_name = $row['Student_Name'];
$login_course = $row['Student_Course'];

if(!isset($user_check))
{
header("Location: ../Main/Main.php");
}
?>