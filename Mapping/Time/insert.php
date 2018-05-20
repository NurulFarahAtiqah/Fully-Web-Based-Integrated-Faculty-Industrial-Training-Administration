<?php
//action.php
if(isset($_POST["action"]))
{
include("../Connections/Check.php"); 
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM time ORDER BY ID DESC";
  $result = mysqli_query($db, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
	 <th width="60%">Type</th>
     <th width="40%">Time</th>
     <th width="10%">Update</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
	 <td>'.$row["type"].'</td>
     <td>'.$row["time"].'</td>
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
  $for = $_POST['For'];
  $file = $_POST["time"];
  $query = "INSERT INTO time(time,type) VALUES ('$file','$for')";
  if(mysqli_query($db, $query))
  {
   echo 'Time Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = $_POST["time"];
  $for = $_POST['For'];
  $query = "UPDATE time SET time = '$file', Type = '$for' WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'Time Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM time WHERE ID = '".$_POST["time_id"]."'";
  if(mysqli_query($db, $query))
  {
   echo 'Time Deleted from Database';
  }
 }
}
?>
