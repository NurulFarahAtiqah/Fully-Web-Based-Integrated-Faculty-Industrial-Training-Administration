<?php 

include("../Connections/Check.php"); 



if(isset($_POST['submit']))
{   
  
	
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$replace = 0;
	$new = 0;
	
	
	$handle = fopen($file,"r");
	$HEADER = fgetcsv($handle,1000,",");
	
	while(($fileop = fgetcsv($handle,1000,","))!== false)
	{
		$studentname = $fileop[3];
		$studentmatric = $fileop[1];
		$studentcourse = $fileop[0];
		
		$studentphone = $fileop[5];
		$studentic = $fileop[2];
		$studenttel = $fileop[4];
		
	    $checksame = $db->query("SELECT Student_Matric FROM student WHERE Student_Matric='$studentmatric'");
		$row = mysqli_num_rows($checksame);
		
		if($row >= 1)
		{
				$sql = $db->query('UPDATE student SET Student_Name="'.$studentname.'",Student_Matric="'.$studentmatric.'",Student_Course="'.$studentcourse.'",semester_session="'.$session.'",Student_Phone="0'.$studentphone.'",Student_Tel="0'.$studenttel.'",Student_IC="'.$studentic.'" WHERE Student_Matric="'.$studentmatric.'"');
				if($sql)
					$replace += 1;
				
		}
			else
		{
				$sql = $db->query('INSERT INTO student(Student_Name,Student_Matric,Student_Course,semester_session,Student_Phone,Student_Tel,Student_IC) VALUES ("'.$studentname.'","'.$studentmatric.'","'.$studentcourse.'","'.$session.'","0'.$studentphone.'","0'.$studenttel.'","'.$studentic.'")');
				if($sql)
					$new += 1;
				
		}
	}
	echo "<script type='text/javascript'>alert('$new New Data Inserted. \\n$replace Old Data Updated.');</script>";
	echo "<script> location.href='View_Student.php'; </script>";
	exit();
}
?>