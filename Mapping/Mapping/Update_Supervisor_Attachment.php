<?php
session_start();
require_once('../Connections/Connection.php');

$rownum = $_GET['Group_Id'];
$supervisorname = $_POST['supervisor'];
$supervisorid = "SELECT Supervisor_Id FROM supervisor WHERE Supervisor_Name='$supervisorname'";
$result = mysqli_query($db,$supervisorid);

while($row = mysqli_fetch_assoc($result)){
$svid = $row['Supervisor_Id'];
$insertsql2 = "UPDATE sv_assignment SET Supervisor_Id='$svid' WHERE Group_Id='$rownum';";
$db->query($insertsql2);
}

?>
<script>
alert('Successfully Attached');
    window.location.href='../Mapping/Supervisor_Attachment.php';
</script>
<?php
		mysqli_close($db);
?>
