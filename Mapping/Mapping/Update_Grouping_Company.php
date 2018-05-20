<?php
session_start();
require_once('../Connections/Connection.php');


$rownum = $_GET['Group_Id'];
$sessionsem = $_POST['semester_session'];

if(null!==$_POST['cname1'] && ($_POST['cname1']!=1)){
  $company1 = $db->escape_string($_POST['cname1']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company1'";
  $db->query($insertsql);
};
if(null!==$_POST['cname2'] && ($_POST['cname2']!=2)){
  $company2 = $db->escape_string($_POST['cname2']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company2'";
  $db->query($insertsql);
};
if(null!==$_POST['cname3'] && ($_POST['cname3']!=3)){
  $company3 = $db->escape_string($_POST['cname3']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company3'";
  $db->query($insertsql);
};
if(null!==$_POST['cname4'] && ($_POST['cname4']!=4)){
  $company4 = $db->escape_string($_POST['cname4']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company4'";
  $db->query($insertsql);
};
if(null!==$_POST['cname5'] && ($_POST['cname5']!=5)){
  $company5 = $db->escape_string($_POST['cname5']);
  $insertsql = "UPDATE company SET Group_Id=$rownum WHERE Company_Name='$company5'";
  $db->query($insertsql);
};

$insertsql2 = "UPDATE sv_assignment SET semester_session='$sessionsem' WHERE Group_Id=$rownum";
$db->query($insertsql2);
?>
<script>
alert('Successfully Updated');
    window.location.href='../Mapping/View_Company_Grouping.php';
</script>
<?php
		mysqli_close($db);
?>
