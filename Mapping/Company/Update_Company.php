<?php
// including the database connection file
include("../Connections/Check.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['Company_Id'];
    $name = $_POST['Company_Name'];
    $add = $_POST['Company_Add'];
    $add2 = $_POST['Company_Add2'];
	$city = $_POST['Company_City'];
	$posscode = $_POST['Company_Posscode'];
    $state = $_POST['Company_State'];
	$phone = $_POST['Company_Phone'];
	$fax = $_POST['Company_Fax'];
	$lat= $_POST['Company_Latitude'];
	$long = $_POST['Company_Longtitude'];
    
      
        //updating the table
      $result = mysqli_query($db, "UPDATE company SET Company_Name='$name', Company_Phone='$phone', Company_Fax='$fax',Company_Add='$add', Company_Posscode='$posscode', Company_State='$state',Company_Latitude='$lat',Company_Longtitude='$long' WHERE Company_Id=$id");
		


		  echo "<script>
		  alert('Successfully Updated');
		  window.location.href='View_CompanyALL.php';
		  </script>";
        
      
}
?>
<?php
//getting id from url
$id = $_GET['Company_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM company WHERE Company_Id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['Company_Name'];
    $add = $res['Company_Add'];
    $add2 = $res['Company_Add2'];
	$city = $res['Company_City'];
	$posscode = $res['Company_Posscode'];
    $state = $res['Company_State'];
	$phone = $res['Company_Phone'];
	$fax = $res['Company_Fax'];
	$lat= $res['Company_Latitude'];
	$long = $res['Company_Longtitude'];
    
}
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
                                    <h4 class="title">Update Company Detail</h4></div>
                                <div class="card-content">
                                
                                <!--form-->
                                <form method="post" name="form1" action="Update_Company.php" class="form-horizontal">
                                <div class="form-group has-feedback has-success">
                                <label class="control-label col-sm-3"for="Company_Name">Company Name:</label>
                                <div class="col-sm-6">
       							<input type="text" class="form-control" id="Company_Name" name="Company_Name"  value="<?php echo $name; ?>">
                                </div>
                                </div>
                                
                                 
                             
                               
                               
                               <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Add">Company Address 1:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Add" name="Company_Add" value= "<?php echo $add; ?>" >
                               </div>
                               </div>
                               
                               
                                <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Add2">Company Address 2:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Add2" name="Company_Add2" value= "<?php echo $add2; ?>" >
                               </div>
                               </div>
                               
                               
                                <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_City">Company City:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_City" name="Company_City" value= "<?php echo $city; ?>" >
                               </div>
                               </div>
                               
                                
   
                               <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Posscode">Company Postcode:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Posscode" name="Company_Posscode"  value="<?php echo $posscode; ?>" >
                               </div>
                               </div> 
                               
                               
                               <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_State">Company State:</label>
                               <div class="col-sm-6">
                               <select class="form-control" id="Company_State" name="Company_State">
                               <option selected>Choose State</option>
                              <option <?php if($city== "MELAKA") echo "selected"; ?>>MELAKA</option>
                              <option <?php if($city== "PERAK") echo "selected"; ?>>PERAK</option>
                              <option<?php if($city== "JOHOR") echo "selected"; ?>>JOHOR</option>
                              <option<?php if($city== "N.SEMBILAN") echo "selected"; ?>>N.SEMBILAN</option>
                              <option <?php if($city== "SELANGOR") echo "selected"; ?>>SELANGOR</option>
                              <option<?php if($city== "KUALA LUMPUR") echo "selected"; ?>>KUALA LUMPUR</option>
                              <option <?php if($city== "PULAU PINANG") echo "selected"; ?>>PULAU PINANG</option>
                              <option <?php if($city== "KEDAH") echo "selected"; ?>>KEDAH</option>
                              <option <?php if($city== "PERLIS") echo "selected"; ?>>PERLIS</option>
                              <option <?php if($city== "PAHANG") echo "selected"; ?>>PAHANG</option>
                              <option<?php if($city== "TERENGGANU") echo "selected"; ?>>TERENGGANU</option>
                              <option <?php if($city== "KELANTAN") echo "selected"; ?>>KELANTAN</option>
                              <option <?php if($city== "SABAH") echo "selected"; ?>>SABAH</option>
                              <option <?php if($city== "SARAWAK") echo "selected"; ?>>SARAWAK</option>
                              </select>
                               </div>
                               </div> 
                               
                                <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Phone">Company Phone:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Phone" name="Company_Phone"  value="<?php echo $phone; ?>">
                               </div>
                               </div>
                               
                                <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Fax">Company Fax No:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Fax" name="Company_Fax"  value="<?php echo $fax; ?>">
                               </div>
                               </div>
                               
                               
                               <div class="form-group has-feedback has-success">
                               <label class="control-label col-sm-3"for="Company_Latitude">Company Latitude:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Latitude" name="Company_Latitude"   value="<?php echo $lat; ?>" >
                               </div>
                               </div> 
                               
                               
                              <div class="form-group has-feedback has-success">
                              <label class="control-label col-sm-3"for="Company_Longtitude">Company Longtitude:</label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_Longtitude" name="Company_Longtitude"   value="<?php echo $long; ?>" >
                              </div>
                              </div> 
                              
                              
    
                              <input type="hidden" name="Company_Id" value=<?php echo $_GET['Company_Id'];?>>
                              <input type="submit" name="update" value="Update" class="btn btn-default" >
    
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