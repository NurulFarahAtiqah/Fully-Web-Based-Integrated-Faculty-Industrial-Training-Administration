<?php
session_start();
include("../Connections/Connection.php"); //Establishing connection with our database
 
$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
if(empty($_POST["Student_Matric"])|| empty($_POST["Student_IC"]))
{
$error = "Both fields are required.";
}else
{
// Define $username and $password
$username=$_POST['Student_Matric'];
$password=$_POST['Student_IC'];
 
// To protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);

 
//Check username and password from database
$sql="SELECT * FROM student WHERE Student_Matric='$username' and Student_IC='$password'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 
//If username and password exist in our database then create a session.
//Otherwise echo error.
if(mysqli_num_rows($result) == 1)
{	
	$_SESSION['Student_Matric'] = $username; // Initializing Session
	echo "<script>
alert('Successfully Login');
window.location.href='../Student Main/StudentMain.php';
</script>";
	
}
else
{
$error = "Incorrect Student Matric No or Password";
} 
}
}
 
?>