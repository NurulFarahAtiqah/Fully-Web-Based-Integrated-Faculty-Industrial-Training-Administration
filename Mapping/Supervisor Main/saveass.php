<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include("SupervisorCheck.php"); 
 
if(isset($_POST['Submit'])) {    
   
 
   	$id = $_POST['Student_Id'];  
	 
	$result = $db->query("SELECT * FROM student WHERE Student_Name = '$id'") ;
	$row1 = mysqli_fetch_array($result);
	$student_id = $row1['Student_Id'];
    $QA1 = $_POST['QA1'];
	$QA11 = $_POST['QA11'];
	$QA2 = $_POST['QA2'];
	$QA21 = $_POST['QA21'];
	$QA3 = $_POST['QA3'];
	$QB1 = $_POST['QB1'];
	$QC1 = $_POST['QC1']; 
	$QC2 = $_POST['QC2']; 
	$QC3 = $_POST['QC3']; 
	$QC4 = $_POST['QC4']; 
	
	$query1 = "SELECT time FROM time WHERE type='Training Assessment'";
	$result1 = mysqli_query($db,$query1);
	while($row = mysqli_fetch_array($result1))
	{
		$time = $row['time'];
	}
	

	if(date("Y-m-d h:i:sa") > $time)
	{
		 $status = "Submitted Late";
	}
	else
	{
		 $status = "Submitted";
	}
	
          
        //insert data to database
        $result = mysqli_query($db, 'INSERT INTO c_mark(Student_Id,Supervisor_Id,Department_Name,QA1,QA11,QA2,QA21,QA3,QB1,QC1,QC2,QC3,QC4,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$login_dept.'","'.$QA1.'","'.$QA11.'","'.$QA2.'","'.$QA21.'","'.$QA3.'","'.$QB1.'","'.$QC1.'","'.$QC2.'","'.$QC3.'","'.$QC4.'","'.$status.'")');
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_ass.php';
		  </script>";
        
       
    
}
?>
</body>
</html>