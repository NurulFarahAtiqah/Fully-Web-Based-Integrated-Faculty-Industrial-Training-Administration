<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include("../Connections/Connection.php");
 
if(isset($_POST['Submit'])) {    

$sql = 'SELECT * FROM student WHERE Student_Name = "'.$_POST['cname'].'"';
$sql2 = 'SELECT * FROM supervisor WHERE Supervisor_Name = "'.$_POST['name'].'"';

$result = mysqli_query($db, $sql);
$result2 = mysqli_query($db, $sql2);

$row = mysqli_fetch_array($result);
$row2 = mysqli_fetch_array($result2);

$matric = $row['Student_Matric'];
$student_id = $row['Student_Id'];
$supervisor_id = $row2['Supervisor_Id'];
$course = $_POST['Student_Course'];
$QA1 = $_POST['QA1'];
$QA2 = $_POST['QA2'];
$QA3 = $_POST['QA3'];
$QA4 = $_POST['QA4'];
$QA5 = $_POST['QA5'];
$QA6 = $_POST['QA6'];
$QA7 = $_POST['QA7'];
$QA8 = $_POST['QA8'];
$QB1 = $_POST['QB1'];
$QB2 = $_POST['QB2'];
$QB3 = $_POST['QB3'];
$QB4 = $_POST['QB4'];
$QB5 = $_POST['QB5'];
$QB6 = $_POST['QB6'];
$QB7 = $_POST['QB7'];
$QB8 = $_POST['QB8'];
$QB9 = $_POST['QB9'];
$QB10 =$_POST['QB10'];
$QC1 = $_POST['QC1'];
$QC2 = $_POST['QC2'];
$QC3 = $_POST['QC3'];



$insertsql = 'INSERT INTO feedback(Student_Id, Supervisor_Id, Student_Course, QA1, QA2, QA3, QA4, QA5, QA6, QA7, QA8, QB1, QB2, QB3, QB4, QB5, QB6, QB7, QB8, QB9, QB10, QC1, QC2, QC3) VALUES ("'.$student_id.'","'.$supervisor_id.'","'.$course.'","'.$QA1.'","'.$QA2.'","'.$QA3.'","'.$QA4.'","'.$QA5.'","'.$QA6.'","'.$QA7.'","'.$QA8.'","'.$QB1.'","'.$QB2.'","'.$QB3.'","'.$QB4.'","'.$QB5.'","'.$QB6.'","'.$QB7.'","'.$QB8.'","'.$QB9.'","'.$QB10.'","'.$QC1.'","'.$QC2.'","'.$QC3.'")';

$result = mysqli_query($db, $insertsql);


$result1 = mysqli_query($db, "INSERT INTO notification (Student_Id, Supervisor_Id, Message, Status, Time,Type) VALUES ('$student_id', '$supervisor_id','', 'unread', CURRENT_TIMESTAMP,'SV_Feedback')");

echo "<script>
alert('Successfully Send Feedback');
window.location.href='ViewFeedback.php?Student_Matric=$matric';
</script>";
}
?>

</body>
</html>
		
