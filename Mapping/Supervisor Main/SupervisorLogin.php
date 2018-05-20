<?php
session_start();
include("../Connections/Connection.php"); //Establishing connection with our database
 
$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
if(empty($_POST["Supervisor_StaffID"]) || empty($_POST["Supervisor_Password"]))
{
$error = "Both fields are required.";
}else
{
// Define $username and $password
$username=$_POST['Supervisor_StaffID'];
$password=$_POST['Supervisor_Password'];
 
// To protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);

 
//Check username and password from database
$sql="SELECT * FROM supervisor WHERE Supervisor_StaffID='$username' and Supervisor_Password='$password'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 
//If username and password exist in our database then create a session.
//Otherwise echo error.

if(mysqli_num_rows($result) == 1 && $password == '123456')
{	
$sql= "SELECT semester_session FROM session ORDER BY Session_Id DESC LIMIT 1";
$result=mysqli_query($db,$sql);
$r = mysqli_fetch_array($result);
$_SESSION["semsesi"] = $r['semester_session'];
$_SESSION['Supervisor_StaffID'] = $username; // Initializing Session


	echo "<script>
alert('Please change password,security question and security answer');
window.location.href='../Supervisor Main/UpdatePhone.php';
</script>";
}
else if (mysqli_num_rows($result) == 1 )
{
	$_SESSION['Supervisor_StaffID'] = $username; // Initializing Session
	$sql= "SELECT semester_session FROM session ORDER BY Session_Id DESC LIMIT 1";
	$result=mysqli_query($db,$sql);
	$r = mysqli_fetch_array($result);
	$_SESSION["semsesi"] = $r['semester_session'];
	
	echo "<script>
alert('Successfully Login');
window.location.href='../Supervisor Main/SupervisorMain.php';
</script>";
	
}
else
{
$error = "Incorrect Staff Id Or Password";
} 
}
}
 
?>