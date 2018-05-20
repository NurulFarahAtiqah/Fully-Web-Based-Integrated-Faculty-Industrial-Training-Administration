<?php
// including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['Supervisor_Id'];
    $staffid = $_POST['Supervisor_StaffID'];
	$status = $_POST['Supervisor_Status'];
	$role = $_POST['Supervisor_St'];
   	$name = $_POST['Supervisor_Name'];   
	$dept = $_POST['Supervisor_Department'];
	$phone = $_POST['Supervisor_Phone'];
	$pass = $_POST['Supervisor_Password'];
	$comfirm = $_POST['Supervisor_Comfirm']; 
	$sq = $_POST['Supervisor_SQ'];
	$ans = $_POST['Supervisor_ans'];
	
	
    
        //updating the table
        $result = mysqli_query($db, "UPDATE supervisor SET Supervisor_StaffID='$staffid', Supervisor_Name='$name',Supervisor_Department='$dept', Supervisor_Phone='$phone', Supervisor_St='$role',Supervisor_Status='$status', Supervisor_Password='$pass',Supervisor_Comfirm='$comfirm', Supervisor_SQ='$sq',Supervisor_ans='$ans' WHERE Supervisor_Id=$id");
        
        //redirectig to the display page. In our case, it is index.php
      
		
		 echo "<script>
		  alert('Successfully Updated Profile');
		  window.location.href='Profile.php';
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
	$pass = $res['Supervisor_Password'];
	$comfirm = $res['Supervisor_Comfirm']; 
	$sq = $res['Supervisor_SQ'];
	$ans = $res['Supervisor_ans'];

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile</title>
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
                                    <h4 class="title"><?php echo $row['Supervisor_Name']; ?></h4>
                                </div>
                                
                                <div class="card-content">
                                
                                	<!--Form-->
                                    <form method="post" name="form1" action="Update_Profile.php">
                                        
                                        <div class="row"> <!--ROW1-->
                                        
                                             <div class="col-md-4">
                                             <div class="form-group label-floating has-feedback has-success">
                                             <label class="control-label-lg">Staff Id</label>
    										 <input type="text" class="form-control" id="Supervisor_StaffID" name="Supervisor_StaffID" value="<?php echo $staffid; ?>" readonly/>
                                             </div> 
  											 </div>
                                             
                                             
  										    <div class="col-md-4">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Status</label>
                                            <input type="text" class="form-control" id="Supervisor_Status" name="Supervisor_Status" value="<?php echo $status; ?>" required/>
                                            </div>  
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Role</label>
                                            <input type="text" class="form-control" id="Supervisor_St" name="Supervisor_St" value="<?php echo $role; ?>" required/>
                                            </div>
                                            </div>
                                            </div>
                                            <!--end row1-->
                                            
                                            <!--ROW2-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Name</label>
                                            <input type="text" class="form-control" id="Supervisor_Name" name="Supervisor_Name" value="<?php echo $name; ?>" readonly/>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Department</label>
                                            <input type="text" class="form-control" id="Supervisor_Department" name="Supervisor_Department" value="<?php echo $dept; ?>" required/>
                                            </div>
                                            </div>
                                            </div>
                                            <!--end row2-->
                                             
                                            <!--ROW3-->
                                            <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Phone Number</label>
                                            <input type="text" class="form-control" id="Supervisor_Phone" name="Supervisor_Phone" value="<?php echo $phone; ?>" required/>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Password</label>
                                            <input type="password" class="form-control" id="Supervisor_Password" name="Supervisor_Password" value="<?php echo $pass;?>" required/>
                                            <h6>
                                             <input type="checkbox" onclick="myFunction2()">Show Password
                                             </h6>
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Comfirm Password</label>
                                            <input type="password" class="form-control" id="Supervisor_Comfirm" name="Supervisor_Comfirm" value="<?php echo $comfirm; ?>" required/>
                                             <h6>
                                              <input type="checkbox" onclick="myFunction()">Show Password
                                             </h6>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW3-->
                                            
                                            
                                            <!--ROW4-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Security Question</label>
												
											<select class="form-control" id="Supervisor_SQ" name="Supervisor_SQ">
                                            <option selected><?php echo $sq; ?></option>
											<option>What was your favorite place to visit as a child?</option>
											<option>What is your favorite movie?</option>
											<option>What is your favorite color?</option>
											<option>What high school did you attend?</option>
											</select>
											</div>
											</div> 
                                            
                                                                                          
                                            <div class="col-md-6">
                                            <div class="form-group label-floating has-feedback has-success">
                                            <label class="control-label-lg">Security Answer</label>
                                            <input type="text" class="form-control" id="Supervisor_ans" name="Supervisor_ans" value="<?php echo $ans; ?>" required/>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW4-->
                                            
                                            
                                            
                                            <!--row6-->
                                            <div class="row">
                                            <div class="col-md-8">
                                            <input type="hidden" name="Supervisor_Id" value=<?php echo $_GET['Supervisor_Id'];?>>
                                            <input type="submit" id="update" name="update" value="Update" class="btn btn-default">
                                            </div>
                                            </div>
                                            <!--end row6-->
										
                                        <div class="clearfix"></div>
                                        </form>
                                        
                                        <script>
function myFunction2() {
    var x = document.getElementById("Supervisor_Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction() {
    var x = document.getElementById("Supervisor_Comfirm");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

</script>    
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

<script type="text/javascript">
$("#Supervisor_Password").password();
</script>
<script type="text/javascript">
$("#Supervisor_Comfirm").password();
</script>
<script type="text/javascript">
    $(function () {
        $("#update").click(function () {
            var password = $("#Supervisor_Password").val();
            var confirmPassword = $("#Supervisor_Comfirm").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>