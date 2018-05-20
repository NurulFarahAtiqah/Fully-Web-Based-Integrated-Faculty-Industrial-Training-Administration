<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include("../Connections/Connection.php");
 
if(isset($_POST['Submit'])) {    
   
 
   	$name = strtoupper($_POST['Supervisor_Name']);   
	$dept = $_POST['Supervisor_Department'];
	$phone = $_POST['Supervisor_Phone'];
	$role = $_POST['Supervisor_St'];
	$status = $_POST['Supervisor_Status'];
	$staffid = $_POST['Supervisor_StaffID'];

	
          
        //insert data to database
        $result = mysqli_query($db, 'INSERT INTO supervisor(Supervisor_Name,Supervisor_Department,Supervisor_Phone,Supervisor_St,Supervisor_Status,Supervisor_StaffID,Supervisor_Password,Supervisor_Comfirm) VALUES("'.$name.'","'.$dept.'","'.$phone.'","'.$role.'","'.$status.'","'.$staffid.'",123456,123456)');
		
		echo "<script>
		  alert('Successfully Add New Supervisor');
		  window.location.href='View_Supervisor.php';
		  </script>";
        
       
    
}
?>
</body>
</html>