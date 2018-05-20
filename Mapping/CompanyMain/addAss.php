<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include("Check.php"); 
 
if(isset($_POST['Submit'])) {    
   
 
   	$id = $_POST['Student_Id'];  
	 
	$result = $db->query("SELECT * FROM student WHERE Student_Name = '$id'") ;
	$row1 = mysqli_fetch_array($result);
	$student_id = $row1['Student_Id'];
	$svname = strtoupper($_POST['Supervisor_Name']);
    $QA1 = $_POST['QA1'];
	$QA2 = $_POST['QA2'];
	$QA3 = $_POST['QA3'];
	$QA4 = $_POST['QA4'];
	$QB1 = $_POST['QB1'];	
	$QB2 = $_POST['QB2']; 
	$QB3 = $_POST['QB3']; 
	$QB4 = $_POST['QB4'];	
	$QB5 = $_POST['QB5']; 
	$QB6 = $_POST['QB6'];
	$QB7 = $_POST['QB7'];	
	$QB8 = $_POST['QB8']; 
	$QB9 = $_POST['QB9'];
	$QB10 = $_POST['QB10'];	
	$QC1 = $_POST['QC1']; 
	$QC2 = $_POST['QC2']; 

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
        $result = mysqli_query($db, 'INSERT INTO sv_mark(Student_Id,Supervisor_Name,Company_Id,QA1,QA2,QA3,QA4,QB1,QB2,QB3,QB4,QB5,QB6,QB7,QB8,QB9,QB10,QC1,QC2,submit_status) VALUES("'.$student_id.'","'.$svname.'","'.$login_user.'","'.$QA1.'","'.$QA2.'","'.$QA3.'","'.$QA4.'","'.$QB1.'","'.$QB2.'","'.$QB3.'","'.$QB4.'","'.$QB5.'","'.$QB6.'","'.$QB7.'","'.$QB8.'","'.$QB9.'","'.$QB10.'","'.$QC1.'","'.$QC2.'","'.$status.'")');
		
		echo "<script>
		  alert('Successfully Add New Assesment');
		  window.location.href='view_Ass.php';
		  </script>";
        
       
    
}
?>
</body>
</html>