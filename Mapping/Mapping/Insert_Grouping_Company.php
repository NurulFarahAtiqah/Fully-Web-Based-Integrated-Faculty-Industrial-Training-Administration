<?php
session_start();
require_once('../Connections/Connection.php');

$row = "SELECT DISTINCT Group_Id from company where Group_Id !=0  order by Group_Id desc limit 1";
$rowresult = mysqli_fetch_array($db->query($row));
$rownum = $rowresult['Group_Id']+1;

$insertsql2 = "INSERT INTO sv_assignment(Group_Id) VALUES ($rownum)";
$db->query($insertsql2);

if(isset($_POST['cname1'])){
  $company1 = $db->escape_string($_POST['cname1']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company1'";
  $db->query($insertsql);
};
if(isset($_POST['cname2'])){
  $company2 = $db->escape_string($_POST['cname2']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company2'";
  $db->query($insertsql);
};
if(isset($_POST['cname3'])){
  $company3 = $db->escape_string($_POST['cname3']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company3'";
  $db->query($insertsql);
};
if(isset($_POST['cname4'])){
  $company4 = $db->escape_string($_POST['cname4']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company4'";
  $db->query($insertsql);
};
if(isset($_POST['cname5'])){
  $company5 = $db->escape_string($_POST['cname5']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company5'";
  $db->query($insertsql);
};
if(isset($_POST['cname6'])){
  $company6 = $db->escape_string($_POST['cname6']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company6'";
  $db->query($insertsql);
};



?>
<script>
alert('Successfully Grouped');
    window.location.href='../Mapping/view_company_grouping.php';
</script>
<?php
		mysqli_close($db);
?>
