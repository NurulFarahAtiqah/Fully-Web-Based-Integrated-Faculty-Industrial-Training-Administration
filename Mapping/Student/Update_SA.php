<?php
// including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['update']))
{ 
 
 	$sql = "SELECT * FROM student WHERE Student_Matric = '".$_POST['Student_Matric']."'";
	$sql2 = "SELECT * FROM company WHERE Company_Name = '".$_POST['cname']."'";
	$result = $db->query($sql);
	$result2 = $db->query($sql2);

   $row = mysqli_fetch_array($result);
   $row2 = mysqli_fetch_array($result2); 
   
  $id = $_POST['Stud_AttachmentID'];
  $company_name = $row2['Company_Id']; 
  $student_matric = $row['Student_Id'];
  $status = $_POST['Intern_Status'];
  $start = $_POST['Start_Date'];
  $finish = $_POST['Finish_Date'];
  $issue = $_POST['Issue'];
 
	
    
        //updating the table
        $result = mysqli_query($db, "UPDATE stud_attachment SET Company_Id='$company_name',Student_Id='$student_matric', Intern_Status='$status', Start_Date='$start', Finish_Date='$finish', Issue='$issue' WHERE Stud_AttachmentID=$id");
        
		echo "<script>
		  alert('Successfully Updated Student Attachment');
		  window.location.href='View_SA2017.php';
		  </script>";
    
}
?>
<?php
//getting id from url
$id = $_GET['Stud_AttachmentID'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT stud_attachment.Stud_AttachmentID,stud_attachment.Company_Id,stud_attachment.Student_Id,student.Student_Matric,company.Company_Name,stud_attachment.Intern_Status,stud_attachment.Start_Date,stud_attachment.Finish_Date,stud_attachment.Issue FROM `stud_attachment`INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id INNER JOIN `company` ON stud_attachment.Company_Id=company.Company_Id WHERE Stud_AttachmentID=$id");
 
while($res = mysqli_fetch_array($result))
{
   $id = $res['Stud_AttachmentID'];
   $company_id = $res['Company_Id'];   
   $company_name = $res['Company_Name']; 
   $student_id = $res['Student_Id'];
   $student_matric = $res['Student_Matric'];
   $status = $res['Intern_Status'];
   $start = $res['Start_Date'];
   $finish = $res['Finish_Date'];
   $issue = $res['Issue'];
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Update Student Attachment</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
         <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
          
          
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Update Student Attachment</h4>
                                  
                                </div>
                                <div class="card-content">
 <form method="post" name="form1" action="Update_SA.php" form class="form-horizontal">
 <div class="row">
      <div class="form-group"><label class="control-label col-sm-3"for="Company_Id">Company Name:</label>
        <div class="col-sm-6">
          <input id="cname" type="text" name="cname" class="validate form-control" value="<?php echo $company_name; ?>" onkeyup="searchc(this.value)">
          <div id="search_cdiv">
          </div>
          </div>
          </div>
          
          
    <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Matric">Student Matric No:</label>
       <div class="col-sm-6">
       <input type="text"  class="form-control" id="Student_Matric" name="Student_Matric"  value="<?php echo $student_matric; ?>">
   </div>
   </div> 
  <div class="form-group">
   <label class="control-label col-sm-3"for="Intern_Status">Student Status:</label>
    <div class="col-sm-6">
      <select class="form-control" id="Intern_Status" name="Intern_Status">
         <option>Please Choose</option>
        <option <?php if($status== "Internship") echo "selected"; ?>>Internship</option>
        <option <?php if($status== "Drop") echo "selected"; ?>>Drop</option>
      </select>
    </div>
  </div>
   <div class="form-group">
       <label class="control-label col-sm-3"for="Start_Date">Start Date:</label>
       <div class="col-sm-6">
       <input type="date" class="form-control" id="Start_Date" name="Start_Date"  value="<?php echo $start; ?>">
   </div>
   </div> 
   <div class="form-group">
       <label class="control-label col-sm-3"for="Finish_Date">Finish Date:</label>
       <div class="col-sm-6">
       <input type="date" class="form-control" id="Finish_Date" name="Finish_Date"  value="<?php echo $finish; ?>">
   </div>
   </div> 
   <div class="form-group">
       <label class="control-label col-sm-3"for="Issue">Notes:</label>
       <div class="col-sm-6">
       <textarea class="form-control" id="Issue" name="Issue" ><?php echo $issue; ?></textarea>
   </div>
   </div> 
       <input type="hidden" name="Stud_AttachmentID" value=<?php echo $_GET['Stud_AttachmentID'];?>>
      <input type="submit" name="update" value="Update" class="btn btn-default" >
 </form>
                              
                              
                              </div> <!--card content-->
                            </div> <!--card--> 
                        </div> <!--col12-->
                      </div> <!--row-->
                </div> <!--content-->
            </div><!--container-->
            
              <?php include "../Footer.php"; ?>         
  
        </div> <!--main panel-->
    </div> <!--wrapper-->

<?php include "../Footer2.php"; ?>

    <script>
   function searchc(string){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("search_cdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../Mapping/Search_Company_Name.php?s="+string, true);
        xmlhttp.send(null);
}

function setCName(string) {
    document.getElementById("cname").value = string;
    $(".cnameid").hide();
}
  </script>
</body>


</html>