<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "mapping");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM session ORDER BY Session_Id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="60%">Sem/Session</th>
	 <th width="10%">Start Date</th>
     <th width="10%">Finish Date</th>
     <th width="10%">Update</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["semester_session"].'</td>
	 <td>'.$row["Start_Date"].'</td>
	 <td>'.$row["End_Date"].'</td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["Session_Id"].'">Change</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $file = $_POST["session"];
  $Start_Date = $_POST["Start_Date"];
  $End_Date = $_POST["End_Date"];
  $query = "INSERT INTO session(semester_session,Start_Date,End_Date) VALUES ('$file','$Start_Date','$End_Date')";
  if(mysqli_query($connect, $query))
  {
   echo 'Session Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
 $file = $_POST["session"];
  $Start_Date = $_POST["Start_Date"];
  $End_Date = $_POST["End_Date"];
  $query = "UPDATE session SET semester_session = '$file',Start_Date='$Start_Date',End_Date='$End_Date' WHERE Session_Id = '".$_POST["session_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Session Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM session WHERE Session_Id = '".$_POST["session_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Session Deleted from Database';
  }
 }
}
?>
