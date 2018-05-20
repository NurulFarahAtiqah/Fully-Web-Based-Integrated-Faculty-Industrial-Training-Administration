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

	
    $Feedback_Form = $_POST['Feedback_Form'];
	$End_Letter = $_POST['End_Letter'];
	$Logbook = $_POST['Logbook'];
	$Report = $_POST['Report'];
	
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
        $result = mysqli_query($db, 'INSERT INTO atitude_mark(Student_Id,Supervisor_Id,Feedback_Form,End_Letter,Logbook,Report,submit_status) VALUES("'.$student_id.'","'.$login_id.'","'.$Feedback_Form.'","'.$End_Letter.'","'.$Logbook.'","'.$Report.'","'.$status.'")');
		
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_Atitude.php';
		  </script>";
        
       
    
}
?>
</body>
</html>