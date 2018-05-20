<?php
session_start();
require_once('../Connections/Check.php');
$name =$_POST['name'];
$cname=$_POST['cname'];
$sql = 'SELECT * FROM student WHERE Student_Name = "'.$name.'"';
$sql2 = 'SELECT * FROM company WHERE Company_Name = "'.$cname.'"';


$result = $db->query($sql);
$result2 = $db->query($sql2);
$result3 = $db->query('SELECT * FROM session WHERE semester_session = "'.$session.'"');

$row = mysqli_fetch_array($result);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);

$start_date = $row3['Start_Date'];
$finish_date = $row3['End_Date'];

$student_id = $row['Student_Id'];
$company_id = $row2['Company_Id'];



$insertsql = "INSERT INTO stud_attachment(Student_Id,Company_Id,Intern_Status,Start_Date,Finish_Date) VALUES ('$student_id','$company_id','Internship','$start_date','$finish_date')";
 $result = mysqli_query($db, $insertsql);
 
 	echo "<script>
		  alert('Successfully Attached');
		  window.location.href='../Student/view_SA2017.php?success';
		  </script>"



?>
