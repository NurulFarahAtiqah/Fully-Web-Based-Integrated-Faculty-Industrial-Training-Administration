<?php
//action.php
if(isset($_POST["action"]))
{
include("SupervisorCheck.php"); 
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM sv_state WHERE Supervisor_Id = '$login_id'";
  $result = mysqli_query($db, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
	 <th width="20%">State Preference 1</th>
     <th width="20%">State Preference 2</th>
	 <th width="20%">State Preference 3</th>
	  <th width="20%">Submit Status</th>
     <th width="10%">Update</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
	 <td>'.$row["State1"].'</td>
     <td>'.$row["State2"].'</td>
	 <td>'.$row["State3"].'</td>
	 <td>'.$row["submit_status"].'</td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["ID"].'">Change</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["ID"].'">Remove</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
    $s1 = $_POST['State1'];
    $s2 = $_POST['State2'];
    $s3 = $_POST['State3'];
	
	$query1 = "SELECT time FROM time WHERE type='Supervisor State Preference'";
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
	
  $query = "INSERT INTO  sv_state(State1,State2,State3,Supervisor_Id,submit_status) VALUES ('$s1','$s2','$s3','$login_id','$status')";
  if(mysqli_query($db, $query))
  {
   echo 'State Preference Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
    $s1 = $_POST['State1'];
    $s2 = $_POST['State2'];
    $s3 = $_POST['State3'];
	
  $query = "UPDATE sv_state SET State1 = '$s1', State2 = '$s2',State3 = '$s3',Supervisor_Id='$login_id' WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'State Preference Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM sv_state WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'State Preference Deleted from Database';
  }
 }
}
?>
