<?php
session_start();
require_once('../Connections/Connection.php');

$groupid = $_GET['Group_Id'];
$companyid = $_GET['Company_Id'];
$sql = "SET FOREIGN_KEY_CHECKS = 0";
$db->query($sql);

$query2 = "SELECT * FROM `company` WHERE group_id = '$groupid'";
$result2 = mysqli_query($db,$query2);
$check = mysqli_num_rows($result2);

if($check == 1){
$sql2 = "DELETE FROM sv_assignment WHERE Group_Id='$groupid'";
$db->query($sql2);
}

$sql =  "UPDATE company SET Group_Id=0 WHERE Company_Id='$companyid'";
$db->query($sql);

$sql = " SET FOREIGN_KEY_CHECKS = 1";
$db->query($sql);


?>
		<script>
		alert('Successfully Ungroup');
        window.location.href='../Mapping/View_Company_Grouping.php';
    </script>
<?php
		mysqli_close($db);
?>
