<?php
//action.php
if(isset($_POST["action"]))
{
 include("StudentCheck.php"); 
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM pdf  WHERE Student_Id=$login_id ORDER BY ID DESC";
  $result = mysqli_query($db, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="70%">File Name</th>
	  <th width="10%">Submit Status</th>
	 <th width="10%">Download</th>
     <th width="10%">Update</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
	$path = $row['path'];
	$file = basename($path);  
   $output .= '

    <tr>
     <td>'.$file.'</td>
	 <td>'.$row['submit_status'].'</td>
	 <td><a class="btn btn-primary" href="../Supervisor Main/download.php?dow='.$path.'">Download</a></td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["ID"].'">Change</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
	 $sql2 = "SELECT supervisor.Supervisor_Id FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id WHERE student.Student_Id=$login_id";

	$result2 = $db->query($sql2);
	$row2 = mysqli_fetch_array($result2);
	$svid = $row2["Supervisor_Id"];
    $myfile = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];


	$location = "C:/XAMPP/htdocs/Mapping/PDF/$myfile";
	move_uploaded_file($tmp_name,$location);
	
	$query1 = "SELECT time FROM time WHERE type='Student First Visit Report'";
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
	
  $query = "INSERT INTO pdf (Student_Id,path,Supervisor_Id,submit_status) VALUES ('$login_id','$location','$svid','$status')";
  $result = mysqli_query($db, "INSERT INTO notification (Student_Id, Supervisor_Id, Message, Status, Time,Type) VALUES ('$login_id', '$svid','', 'unread', CURRENT_TIMESTAMP,'SV_end_letter')");
  if(mysqli_query($db, $query))
  {
   echo 'Letter Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
	 
 
    $myfile = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];


	$location = "C:/XAMPP/htdocs/Mapping/PDF/$myfile";
	move_uploaded_file($tmp_name,$location);
	
  $query = "UPDATE pdf SET path = '$location' WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'Letter Updated into Database';
  }
 }
}
?>
