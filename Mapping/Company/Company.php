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
    <title>Company</title>
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
                                    <h4 class="title">Insert Company Detail</h4>
                                 </div>
                                 
                                 
                                 <div class="card-content">
                                 <!--Form-->
								<form action="AddCompany.php" method="POST" class="form-horizontal" name="form1" id="form1" data-toggle="validator">
                                
                                <div class="form-group has-feedback">
                                <label class="col-sm-3" for="Company_Name" style="color:#000"><strong>Company Name* :</strong></label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Company_Name" name="Company_Name" placeholder="Company Name" required>
      
                                </div>
                                </div>
                                
                                 
                              <div class="form-group has-feedback">
                              <label class="col-sm-3" for="Company_Add" style="color:#000"><strong>Company Address 1* :</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_Add" name="Company_Add" placeholder="Address 1" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors">Please input the correct address</div>
                              </div>
                              </div>
                              
                               <div class="form-group has-feedback">
                              <label class="col-sm-3" for="Company_Add2" style="color:#000"><strong>Company Address 2* :</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_Add2" name="Company_Add2" placeholder="Address 2" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors">Please input the correct address</div>
                              </div>
                              </div>
                              
                              <div class="form-group has-feedback">
                              <label class="col-sm-3" for="Company_City" style="color:#000"><strong>Company City* :</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_City" name="Company_City" placeholder="City" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors">Please input the correct city</div>
                              </div>
                              </div>
                              
                              
                              
                              <div class="form-group  has-feedback">
                              <label class="col-sm-3" for="Company_Posscode"style="color:#000"><strong>Company Postcode* :</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_Posscode" name="Company_Posscode" maxlength="5" placeholder="Postcode" required>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                              <div class="help-block with-errors">Please input the correct postcode</div>
                              </div>
                              </div>
                              
                              
                              <div class="form-group has-feedback">
                              <label class="col-sm-3"  for="Company_State" style="color:#000"><strong>Company State* :</strong></label>
                              <div class="col-sm-6">
                              <select class="form-control" id="Company_State" name="Company_State">
                              <option selected>Choose State</option>
                              <option>MELAKA</option>
                              <option>PERAK</option>
                              <option>JOHOR</option>
                              <option>N.SEMBILAN</option>
                              <option>SELANGOR</option>
                              <option>KUALA LUMPUR</option>
                              <option>PULAU PINANG</option>
                              <option>KEDAH</option>
                              <option>PERLIS</option>
                              <option>PAHANG</option>
                              <option>TERENGGANU</option>
                              <option>KELANTAN</option>
                              <option>SABAH</option>
                              <option>SARAWAK</option>
                              </select>
                              </div>
                              </div>
                              
                               <div class="form-group  has-feedback">
                                <label class="col-sm-3" for="Company_Phone" style="color:#000"><strong>Company Phone No* </strong>:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Company_Phone" name="Company_Phone" maxlength="11"  placeholder="Phone No." required>
                               <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                               <div class="help-block with-errors">Please input the correct phone number without space</div>
                               </div>
                               </div>
                               
                                <div class="form-group  has-feedback">
                                <label class="col-sm-3" for="Company_Fax" style="color:#000"><strong>Company Fax No* :</strong></label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Company_Fax" name="Company_Fax" maxlength="11"  placeholder="Fax No." required>
                               <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                               <div class="help-block with-errors">Please input the correct fax number without space</div>
                               </div>
                               </div>
                              
                              
                              <div class="form-group"> 
                              <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                              </div>
                              </div>
                              
                              </form>
                              <!--END FORM-->
                              
                              
                              <h4 class="title">Import CSV File</h4>
                              <label class="alert"> Please change Company TEL No and Company Fax No before import</label>
                               <a href="../csv/Senarai_Nama_Company.csv" download>Senarai_Nama_Syarikat.csv</a>
                              <form action="import_company.php" method="post" enctype="multipart/form-data" >
                              <input type="file" name="file" accept=".csv" required/> 
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