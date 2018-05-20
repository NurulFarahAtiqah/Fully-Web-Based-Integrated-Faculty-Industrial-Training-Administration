<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['Submit'])) {    
    $name = strtoupper($_POST['Student_Name']);
	$ic = $_POST['Student_IC'];
    $matric = $_POST['Student_Matric'];
    $course = $_POST['Student_Course'];
	$phone = $_POST['Student_Phone'];
	$tel = $_POST['Student_Tel'];
	

        // if all the fields are filled (not empty)             
        //insert data to database
		$sql = 'INSERT INTO student(Student_Name,Student_Matric,Student_Course,semester_session,Student_Phone,Student_Tel,Student_IC,Password,Confirm_Password) VALUES("'.$name.'","'.$matric.'","'.$course.'","'.$session.'","'.$phone.'","'.$tel.'","'.$ic.'",123456,123456)';
        $result = mysqli_query($db, $sql);
		
			echo "<script>
		  alert('Successfully Add New Student');
		  window.location.href='View_Student.php';
		  </script>";
      

}
?>
</body>
</html>