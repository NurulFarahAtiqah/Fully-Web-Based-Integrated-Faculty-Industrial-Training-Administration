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
    <title>Student</title>
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
                                    <h4 class="title">Insert Student Detail</h4>
                                </div>
                                
                                
                                <div class="card-content">
                                <form action="AddStudent.php" method="POST" class="form-horizontal" name="form1">
                                <div class="form-group has-feedback">
                                <label class="col-sm-3"for="Student_Name" style="color:#000"><strong>Student Name:</strong></label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Name" placeholder="Student Name" name="Student_Name" required/>
                                </div>
                                </div>
                                
                                
                                
                               <div class="form-group">
                               <label class="col-sm-3" for="Student_IC" style="color:#000" ><strong>Student IC NO:</strong></label>
                               <div class="col-sm-6">
                               <input type="number" class="form-control" maxlength="12" id="Student_IC" placeholder="IC NO" name="Student_IC" required/>
                               <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                               <div class="help-block with-errors">Please input the correct IC NO without space or '-'</div>
                               </div>
                               </div>
                                
                                
                                
                                
                                <div class="form-group has-feedback">
                                <label class="col-sm-3" for="Student_Matric" style="color:#000"><strong>Student Matric:</strong></label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" maxlength="10" id="Student_Matric" placeholder="Matric NO" name="Student_Matric" required/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors">Please input the correct matric number</div>
                                </div>
                                </div>
                                
                                
                                
                                <div class="form-group  has-feedback">
                                <label class="col-sm-3"for="Student_Course" style="color:#000"><strong>Student Course:</strong></label>
                                <div class="col-sm-6">
                                <select class="form-control" id="Student_Course" name="Student_Course">
                                <option>BITS</option>
                                <option>BITD</option>
                                <option>BITM</option>
                                <option>BITI</option>
                                <option>BITZ</option>
                                <option>BITC</option>
                                <option>BITE</option>
                                </select>
                                </div>
                                </div> 
        
      
                               <div class="form-group has-feedback">
                               <label class="col-sm-3" for="Student_Tel" style="color:#000"><strong>Student Tel. No.:</strong></label>
                               <div class="col-sm-6">
                               <input type="number" class="form-control" maxlength="12" id="Student_Tel" placeholder="Tel No" name="Student_Tel" required/>
                               <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                               <div class="help-block with-errors">Please input the correct phone number without space and '-'</div>
                               </div>
                               </div>
                               
                               <div class="form-group has-feedback">
                               <label class="col-sm-3" for="Student_Phone" style="color:#000"><strong>Student HP No:</strong></label>
                               <div class="col-sm-6">
                               <input type="number" class="form-control" maxlength="12" id="Student_Phone" placeholder="Phone Number" name="Student_Phone" required/>
                               <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                               <div class="help-block with-errors">Please input the correct phone number without space and '-'</div>
                               </div>
                               </div>
       
       
       <div class="form-group"> 
       <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" name="Submit" class="btn btn-default">Submit</button>
       </div>
       </div>
       
</form>	


        <h4 class="title">Import CSV File</h4>
        <label class="alert"> Please change to number format for IC NO , TEL NO and HP NO before import</label>
      
        <a href="../csv/Senarai_Nama_Pelajar.csv" download>Senarai_Nama_Pelajar.csv</a>
      
        <form action="import.php" method="post" enctype="multipart/form-data" >
        <input type="file" name="file" accept=".csv"/> 
        <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" class="btn btn-success" value="Import Excel" disabled />
        </div>
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