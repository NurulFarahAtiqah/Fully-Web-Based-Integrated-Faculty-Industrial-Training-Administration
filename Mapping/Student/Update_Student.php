<?php
// including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['update']))
{   

    $id = $_POST['Student_Id'];
	$name = $_POST['Student_Name'];
	$ic = $_POST['Student_IC'];
    $matric = $_POST['Student_Matric'];
    $course = $_POST['Student_Course'];
	$semester = $_POST['semester_session'];
	$phone = $_POST['Student_Phone'];
	$tel = $_POST['Student_Tel'];
	
        
   
        //updating the table
        $result = mysqli_query($db, "UPDATE student SET Student_Name='$name',Student_Matric='$matric',Student_Course='$course', semester_session='$semester',Student_Phone='$phone',Student_IC='$ic',Student_Tel='$tel' WHERE Student_Id=$id");
		
        echo "<script>
		  alert('Successfully Updated Student');
		  window.location.href='View_Student.php';
		  </script>"; 
}
?>
<?php
//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM student WHERE Student_Id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['Student_Name'];
	$ic = $res['Student_IC'];
    $matric = $res['Student_Matric'];
    $course = $res['Student_Course'];
	$semester = $res['semester_session'];
	$phone = $res['Student_Phone'];
	$tel = $res['Student_Tel'];
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Update Student</title>
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
                                    <h4 class="title">Update Student Detail</h4>
                                  
                                </div>
                                <div class="card-content">
                                
                                
 <form method="post" name="form1" action="Update_Student.php" class="form-horizontal">
 
 
 
 
   
   
     <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Name">Student Name:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_Name" name="Student_Name"  value="<?php echo $name; ?>" readonly>
   </div>
   </div> 
   
    <div class="form-group">
       <label class="control-label col-sm-3"for="Student_IC">Student IC. NO:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_IC" name="Student_IC"  value="<?php echo $ic; ?>" readonly>
   </div>
   </div> 
   
   
   <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Matric">Student Matric:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_Matric" name="Student_Matric"  value="<?php echo $matric; ?>" readonly>
   </div>
   </div> 
   
   
   
   <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Course">Student Course:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_Course" name="Student_Course"  value="<?php echo $course; ?>" readonly>
   </div>
   </div> 
   
   <div class="form-group">
       <label class="control-label col-sm-3"for="semester_session">Session Semester:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="semester_session" name="semester_session"  value="<?php echo $semester; ?>" readonly>
   </div>
   </div> 
   
   
   <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Tel">Student Tel. No.:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_Tel" name="Student_Tel"  value="<?php echo $tel; ?>" >
   </div>
   </div> 
   
   
   <div class="form-group">
       <label class="control-label col-sm-3"for="Student_Phone">Student HP. No.:</label>
       <div class="col-sm-6">
       <input type="text" class="form-control" id="Student_Phone" name="Student_Phone"  value="<?php echo $phone; ?>" >
   </div>
   </div> 
    
      <input type="hidden" name="Student_Id" value=<?php echo $_GET['Student_Id'];?>>
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
    
</body>
<?php include "../Footer2.php"; ?>
</html>