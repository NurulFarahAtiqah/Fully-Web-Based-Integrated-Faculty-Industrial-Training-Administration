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
	$QB1 = $_POST['QB1'];
	$QB2 = $_POST['QB2'];
	$QB3 = $_POST['QB3'];
	$QB4 = $_POST['QB4'];
	$QB5 = $_POST['QB5'];
	$QC1 = $_POST['QC1'];
	$QC2 = $_POST['QC2'];
	$QC3 = $_POST['QC3'];
	$QD1 = $_POST['QD1'];
	$QD2 = $_POST['QD2'];
	$QD3 = $_POST['QD3'];
	$QD4 = $_POST['QD4'];
	
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
        $result = mysqli_query($db, 'INSERT INTO present_mark(Student_Id,Supervisor_Id,Department_Name,QA1,QB1,QB2,QB3,QB4,QB5,QC1,QC2,QC3,QD1,QD2,QD3,QD4,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$login_dept.'","'.$QA1.'","'.$QB1.'","'.$QB2.'","'.$QB3.'","'.$QB5.'","'.$QC1.'","'.$QC2.'","'.$QC3.'","'.$QB2.'","'.$QD1.'","'.$QD2.'","'.$QD3.'","'.$QD4.'","'.$status.'")');
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_pres.php';
		  </script>";
        
       
    
}
?>
</body>
</html>
