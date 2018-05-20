<?php
include("SupervisorCheck.php"); 
//getting id from url
$id = $login_user;
 
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT * FROM supervisor WHERE Supervisor_StaffID = "'.$id.'"');
 
while($res = mysqli_fetch_array($result))
{
	$id = $res['Supervisor_Id'];
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

$result1 = mysqli_query($db, 'SELECT * FROM time');
 
while($res = mysqli_fetch_array($result1))
{
	$time = $res['time'];  
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor Main</title>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body  onload="startTime()">
    <div class="wrapper">
    <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
          
          
            
       <div class="content">
                <div class="container-fluid">
               
                
                <div class="col-md-2">
               <img src="../icon/an.png" width="50px" height="50px">
                </div>
                
                 <div class="col-md-10">
                 
  <?php
  
  $result2 = mysqli_query($db, "SELECT * FROM anouncement WHERE User='All' OR User='Supervisor'");
   while($row = mysqli_fetch_array($result2))
{
	  $id = $row['Message'];
	  
	  
	  echo '<h5 class="mySlides w3-animate-top ">'; 
	  echo $id;
	  echo'</h5>';
}
    
  ?>
  </div>
 

 <script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 4000); 
}
</script>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title"><?php echo $name; ?></h4>
                                </div>
                                
                                
                                
                                <div class="card-content">
                                   <form> <!--form-->
                                        <!--R1-->
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Staff Id</label>
    										<input type="text" class="form-control" value="<?php echo $staffid; ?>" disabled>
                                            </div> 
  											</div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
          <input type="text" class="form-control" value="<?php echo $status; ?>" disabled>
                                            </div>   
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Role</label>
                                            <input type="text" class="form-control" value="<?php echo $role; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW1-->
                                            
                                            
                                            <!--ROW2-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Department</label>
                                            <input type="text" class="form-control" value="<?php echo $dept; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW2-->
                                         
                                            <!--ROW3-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo $phone; ?>" disabled>
                                            </div>
                                            </div>
                                            
                                            </div>
                                            <!--END ROW3-->
                                            
                                          
                                            
                                           
                                            
                                            
                                            <!--ROW6-->
                                            <div class="row">
                                            <a class=" btn btn-md btn-info" href="UpdatePhone.php?Supervisor_Id=<?php echo $id; ?>">Edit</a>
                                            </div>
                                            <!--END ROW5-->
                                        
                                      
 <div class="clearfix"></div>
                                    </form>
                                    
                                    
                     <!--end form-->
                              
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

