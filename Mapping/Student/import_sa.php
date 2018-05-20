<?php
// including the database connection file
include("../Connections/Check.php");




if(isset($_POST['submit']))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$replace = 0;
	$new = 0;
	$unabletoinsert = 0;
	
	$handle = fopen($file,"r");
	$header = fgetcsv($handle,1000,",");
	 $HEADER = fgetcsv($handle,1000,",");
	while(($fileop = fgetcsv($handle,1000,","))!== false)
	{
		$matric = $fileop[1];
		$companyname = $fileop[6];
		
		

        $result = $db->query('SELECT * FROM student WHERE Student_Matric = "'.$matric.'"') ;
        $result2 = $db->query('SELECT * FROM company WHERE Company_Name = "'.$companyname.'"');
		$result3 = $db->query('SELECT * FROM session WHERE semester_session = "'.$session.'"');
		
		$row1 = mysqli_fetch_array($result);
		$row2 = mysqli_fetch_array($result2);
	    $row3 = mysqli_fetch_array($result3);
		
		$student_id = $row1['Student_Id'];
		$company_id = $row2['Company_Id'];
		$start_date = $row3['Start_Date'];
		$finish_date = $row3['End_Date'];
		
		if($company_id!=NULL)
		{
		 $checksame = $db->query("SELECT Student_Id FROM stud_attachment WHERE Student_Id='$student_id'");
		 $row = mysqli_num_rows($checksame);
		
		if($row >= 1)
		{
				$sql = $db->query("UPDATE stud_attachment SET Student_Id='$student_id',Company_Id='$company_id',Intern_Status='Internship',Start_Date='$start_date',Finish_Date='$finish_date' WHERE Student_Id='$student_id'");
				$replace += 1;
				
		}
			else
		{
				$sql = $db->query("INSERT INTO stud_attachment(Student_Id,Company_Id,Intern_Status,Start_Date,Finish_Date) VALUES ('$student_id','$company_id','Internship','$start_date','$finish_date')");
				$new += 1;
				
		}
		}
		else
		{
			
			$unabletoinsert +=1;
		}
	
	}
	
	echo "<script>
		 alert('$new New Data Inserted. \\n$replace Old Data Replaced.\\n$unabletoinsert Unable to Insert.Please Insert Manually');
		  window.location.href='view_SA2017.php';
		  </script>";
	  
}
		
?>