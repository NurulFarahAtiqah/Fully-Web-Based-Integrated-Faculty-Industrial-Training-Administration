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

	$cname = $_POST['Company_Name'];
    $QA1 = $_POST['QA1'];
	$QA2 = $_POST['QA2'];
	$QA3 = $_POST['QA3'];
	$QAA4 = $_POST['QAA4'];
	$QAA41 = $_POST['QAA41'];
	$QA4 = $_POST['QA4'];
	$QA41 = $_POST['QA41'];
	$QA5 = $_POST['QA5'];
	$QA6 = $_POST['QA6'];
	$QA7 = $_POST['QA7'];
	
	$QB1 = $_POST['QB1'];
	$QB2 = $_POST['QB2'];
	$QB3 = $_POST['QB3'];
	$QB4 = $_POST['QB4'];
	
	$QC1 = $_POST['QC1']; 

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
        $result = mysqli_query($db, 'INSERT INTO report(Student_Id,Supervisor_Id,Company_Name,QA1,QA2,QA3,QAA4,QAA41,QA4,QA41,QA5,QA6,QA7,QB1,QB2,QB3,QB4,QC1,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$cname.'","'.$QA1.'","'.$QA2.'","'.$QA3.'","'.$QAA4.'","'.$QAA41.'","'.$QA4.'",
		"'.$QA41.'","'.$QA5.'","'.$QA6.'","'.$QA7.'","'.$QB1.'","'.$QB2.'","'.$QB3.'","'.$QB4.'","'.$QC1.'","'.$status.'")');
		
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_rep.php';
		  </script>";
        
       
    
}
?>
</body>
</html>