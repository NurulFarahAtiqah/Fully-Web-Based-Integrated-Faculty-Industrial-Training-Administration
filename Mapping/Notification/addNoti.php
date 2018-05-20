<?php
//action.php
if(isset($_POST["action"]))
{
include("../Connections/Check.php"); 
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM anouncement ORDER BY time DESC";
  $result = mysqli_query($db, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">For</th>
	 <th width="60%">Announcement/Notification</th> 
	 <th width="40%">Time Announcement</th>
     <th width="10%">Update</th>
	 <th width="10%">Delete</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
	$For = $row['User'];
    $Message = $row['Message'];
	$time = $row['time'];
	 
   $output .= '

    <tr>
	 <td>'.$For.'</td>
     <td>'.$Message.'</td>
	 <td>'.$time.'</td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["ID"].'">Change</button></td>
	 <td><button type="button" name="delete" class="btn btn-info bt-xs delete" id="'.$row["ID"].'">Delete</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {

		$for = $_POST['For'];
		$m = $_POST['Message'];

	
  $query = "INSERT INTO anouncement (User,Message) VALUES ('$for','$m')";
 
  if(mysqli_query($db, $query))
  {
   echo 'Announcement Inserted';
  }
 }
 if($_POST["action"] == "update")
 {
	 
 
  $for = $_POST['For'];
  $m = $_POST['Message'];


	
	
  $query = "UPDATE anouncement SET User = '$for',Message='$m' WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'Announcement Updated';
  }
 }
 
  if($_POST["action"] == "delete")
 {
	 
	
  $query = "DELETE FROM anouncement WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'Announcement Deleted';
  }
 }
}
?>
