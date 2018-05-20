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
	$QA3 = $_POST['QA3'];
	$QA4 = $_POST['QA4'];
	$QA5 = $_POST['QA5'];
	$QA6 = $_POST['QA6'];
	$QA7 = $_POST['QA7'];
	
	

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
        $result = mysqli_query($db, 'INSERT INTO pre_evaluation(Student_Id,Supervisor_Id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$QA1.'","'.$QA2.'","'.$QA3.'","'.$QA4.'","'.$QA5.'","'.$QA6.'","'.$QA7.'","'.$status.'")');
		
		
		echo "<script>
		  alert('Successfully Add New First Visit Report');
		  window.location.href='viewPreEvaluation.php';
		  </script>";
        
       
    
}
?>
</body>
</html>