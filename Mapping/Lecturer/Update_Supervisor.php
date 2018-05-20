<?php
// including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['Supervisor_Id'];
    $staffid = $_POST['Supervisor_StaffID'];
   	$name = $_POST['Supervisor_Name'];   
	$dept = $_POST['Supervisor_Department'];
	$phone = $_POST['Supervisor_Phone'];
	$role = $_POST['Supervisor_St'];
	$status = $_POST['Supervisor_Status'];

	
	
        //updating the table
        $result = mysqli_query($db, "UPDATE supervisor SET Supervisor_StaffID='$staffid', Supervisor_Name='$name',Supervisor_Department='$dept', Supervisor_Phone='$phone', Supervisor_St='$role',Supervisor_Status='$status' WHERE Supervisor_Id=$id");
        
        //redirectig to the display page. In our case, it is index.php
		echo "<script>
		  alert('Successfully Updated');
		  window.location.href='View_Supervisor.php';
		  </script>";
    
}
?>
<?php
//getting id from url
$id = $_GET['Supervisor_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM supervisor WHERE Supervisor_Id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $staffid = $res['Supervisor_StaffID'];
   	$name = $res['Supervisor_Name'];   
	$dept = $res['Supervisor_Department'];
	$phone = $res['Supervisor_Phone'];
	$role = $res['Supervisor_St'];
	$status = $res['Supervisor_Status'];

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Update Supervisor</title>
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
                            
                            
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Update Lecturer Detail</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                <!--form-->
                                
                                <form method="post" name="form1" action="Update_Supervisor.php" class="form-horizontal">
                               <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Supervisor_StaffID">Staff ID*:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Supervisor_StaffID" name="Supervisor_StaffID"  value="<?php echo $staffid;?>" readonly>
                               </div>
                               </div> 
                               
                               
                             <div class="form-group has-feedback has-success">
                             <label class="control-label col-sm-3"for="Supervisor_Name">Lecturer Name*:</label>
                             <div class="col-sm-6">
                             <input type="text" class="form-control" id="Supervisor_Name" name="Supervisor_Name"  value="<?php echo  $name; ?>" readonly>
                             </div>
                             </div>
                             
                              
                            <div class="form-group has-feedback has-success">
                            <label class="control-label col-sm-3" for="Supervisor_Department">Lecturer Department*:</label>
                            <div class="col-sm-6">
                            <select class="form-control" id="Supervisor_Department" name="Supervisor_Department">
                            <option>Please Choose</option>
                            <option <?php if($dept== "Department of Interactive Media") echo "selected"; ?>>Department of Interactive Media</option>
                            <option <?php if($dept== "Department of Software Engineering") echo "selected"; ?>>Department of Software Engineering</option>
                            <option <?php if($dept== "epartment of Intelligent Computing and Analytics") echo "selected"; ?>>Department of Intelligent Computing and Analytics</option>
                            <option <?php if($dept== "Department of Computer System and Communications") echo "selected"; ?>>Department of Computer System and Communications</option>
                            </select>
                            </div>
                            </div>
   
   
                           <div class="form-group has-feedback has-success">
                           <label class="control-label col-sm-3"for="Supervisor_Phone">Lecturer Phone*:</label>
                           <div class="col-sm-6">
                           <input type="text" class="form-control" id="Supervisor_Phone" name="Supervisor_Phone"  value="<?php echo $phone; ?>" required>
                           </div>
                           </div> 
                           
                           
                           <div class="form-group has-feedback has-success">
                           <label class="control-label col-sm-3"  for="Supervisor_St">Lecturer Role*:</label>
                           <div class="col-sm-6">
                           <select class="form-control" id="Supervisor_St" name="Supervisor_St">
                           <option>Please Choose</option>
                           <option <?php if($role== "AJK") echo "selected"; ?>>AJK</option>
                           <option <?php if($role== "Supervisor") echo "selected"; ?>>Supervisor</option>
                           </select>
                           </div>
                           </div>
                           
                           
                          <div class="form-group has-feedback has-success">
                          <label class="control-label col-sm-3"  for="Supervisor_Status">Lecturer Status*:</label>
                          <div class="col-sm-6">
                          <select class="form-control" id="Supervisor_Status" name="Supervisor_Status" >
                          <option>Please Choose</option>
                          <option <?php if($status== "Active") echo "selected"; ?>>Active</option>
                          <option <?php if($status== "Non Active") echo "selected"; ?>>Non Active</option>
                          </select>
                          </div>
                          </div>
                          
                          
                          
                         
                       
                       
   
   
                      <input type="hidden" name="Supervisor_Id" value=<?php echo $_GET['Supervisor_Id'];?>>
                      <input type="submit" id="update" name="update" value="Update" class="btn btn-default" >  
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


