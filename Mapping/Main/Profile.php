<?php
 include("../Connections/Check.php"); 
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
                                
                                    <form> <!--form-->
                                        <!--R1-->
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Staff Id</label>
    										<input type="text" class="form-control" value="<?php echo $row['Supervisor_StaffID']; ?>" disabled>
                                            </div> 
  											</div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
          <input type="text" class="form-control" value="<?php echo $row['Supervisor_Status']; ?>" disabled>
                                            </div>   
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Role</label>
                                            <input type="text" class="form-control" value="<?php echo $row['Supervisor_St']; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW1-->
                                            
                                            
                                            <!--ROW2-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $row['Supervisor_Name']; ?>" disabled>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Department</label>
                                            <input type="text" class="form-control" value="<?php echo $row['Supervisor_Department']; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            <!--END ROW2-->
                                         
                                            <!--ROW3-->
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo $row['Supervisor_Phone']; ?>" disabled>
                                            </div>
                                            </div>
                                            
                                          
                                            </div>
                                            <!--END ROW3-->
                                            
                                            
                                           
                                           
                                            
                                            
                                            <!--ROW6-->
                                            <div class="row">
                                            <a class=" btn btn-md btn-info" href="Update_Profile.php?Supervisor_Id=<?php echo $row['Supervisor_Id']; ?>">Edit</a>
                                            </div>
                                            <!--END ROW5-->
                                        
                                      
 <div class="clearfix"></div>
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