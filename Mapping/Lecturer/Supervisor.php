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
    <title>Supervisor</title>
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
                                    <h4 class="title">Insert Lecturer Detail</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="AddSupervisor.php" method="POST" class="form-horizontal" name="form1" data-toggle="validator">
                                <div class="form-group has-feedback">
                                <label class="col-sm-3" for="Supervisor_Name" style="color:#000"><strong>Lecturer Name*:</strong></label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Supervisor_Name" placeholder="Supervisor Name" name="Supervisor_Name" required>
                                </div>
                                </div>
                                
                                
                                <div class="form-group  has-feedback">
                                <label class="col-sm-3" for="Supervisor_Department" style="color:#000"><strong>Lecturer Department*:</strong></label>
                                <div class="col-sm-6">
                                <select class="form-control" id="Supervisor_Department" name="Supervisor_Department">
                                <option>Department of Interactive Media</option>
                                <option>Department of Software Engineering</option>
                                <option>Department of Intelligent Computing and Analytics</option>
                                <option>Department of Computer System and Communications</option>
                                </select>
                                </div>
                                </div>
                                
                                 
                                <div class="form-group has-feedback">
                                <label class="col-sm-3" for="Supervisor_Phone" style="color:#000"><strong>Lecturer Phone No*:</strong></label>
                                <div class="col-sm-6">
                                <input type="number" class="form-control" maxlength="11" id="Supervisor_Phone" placeholder="Phone Number" name="Supervisor_Phone" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors">Please input the correct phone number without space or '-'</div>
                                </div>
                                </div>
                                
                                
                               <div class="form-group  has-feedback">
                               <label class="col-sm-3"  for="Supervisor_St" style="color:#000"><strong>Lecturer Role*:</strong></label>
                               <div class="col-sm-6">
                               <select class="form-control" id="Supervisor_St" name="Supervisor_St">
                               <option>AJK</option>
                               <option>Supervisor</option>
                               </select>
                               </div>
                               </div>
                               
                               
                              <div class="form-group  has-feedback">
                              <label class="col-sm-3"  for="Supervisor_Status" style="color:#000"><strong>Lecturer Status*:
                              </strong></label>
                              <div class="col-sm-6">
                              <select class="form-control" id="Supervisor_Status" name="Supervisor_Status" >
                              <option>Active</option>
                              <option>Non Active</option>
                              </select>
                              </div>
                              </div>
                              
                              
                              <div class="form-group  has-feedback">
                              <label class="col-sm-3" for="Supervisor_StaffID" style="color:#000"><strong>Lecturer StaffID*:</strong></label>
                              <div class="col-sm-6">
                              <input type="number" class="form-control" maxlength="5" placeholder="Staff ID" id="Supervisor_StaffID" name="Supervisor_StaffID" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors">Please input the correct staff id</div>
                              </div>
                              </div>

                              
                              <div class="form-group"> 
                              <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" id="submit" name="Submit" class="btn btn-default">Submit</button>
                              </div>
                              </div>
                              
                              </form>
                              <!--end form-->

                              <h4 class="title">Import CSV File</h4>
                              <a href="../csv/Senarai_Nama_Pensyarah.csv" download>Senarai_Nama_Pensyarah.csv</a>
                              <form action="import_supervisor.php" method="post" enctype="multipart/form-data" >
                              <input type="file" name="file" accept=".csv" required/> 
                              <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" name="submit" class="btn btn-success" value="Import Excel"  disabled/>
                              </div>
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



 <script type="text/javascript"> 
                              $(document).ready(
                              function(){
                                  $('input:file').change(
                                      function(){
                                          if ($(this).val()) {
                                              $('input:submit').attr('disabled',false); 
                                          } 
                                      }
                                      );
                              });
							  
 </script>