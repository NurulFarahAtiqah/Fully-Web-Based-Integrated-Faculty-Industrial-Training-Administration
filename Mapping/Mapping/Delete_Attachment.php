<?php
session_start();
require_once('../Connections/Connection.php');

$groupid = $_GET['Group_Id'];
$sql = "UPDATE sv_assignment SET Supervisor_Id=NULL WHERE Group_Id='$groupid'";
$db->query($sql);

?>
		<script>
		alert('Successfully Unattached');
        window.location.href='../Mapping/Supervisor_Attachment.php';
    </script>
<?php
		mysqli_close($db);
?>
