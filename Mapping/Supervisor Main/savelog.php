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
	$QA2 = $_POST['QA2'];
	
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
        $result = mysqli_query($db, 'INSERT INTO logbook_mark(Student_Id,Supervisor_Id,Department_Name,QA1,QA2,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$login_dept.'","'.$QA1.'","'.$QA2.'","'.$status.'")');
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_log.php';
		  </script>";
        
       
    
}
?>
</body>
</html>