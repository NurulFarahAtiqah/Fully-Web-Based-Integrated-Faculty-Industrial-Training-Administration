<?php
// including the database connection file
include("Check.php");
 
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
	$pass = $_POST['Password'];
	$cpass = $_POST['Confirm_Password'];
	$sq = $_POST['Security_Question'];
	$sa =$_POST['Security_Answer'];
    
      
        //updating the table
        $result = mysqli_query($db, "UPDATE company SET Company_Name='$name', Company_Phone='$phone', Company_Fax='$fax',Company_Add='$add', Company_Posscode='$posscode', Company_State='$state',Company_Latitude='$lat',Company_Longtitude='$long', Password='$pass', Confirm_Password='$cpass',Security_Question='$sq',Security_Answer='$sa' WHERE Company_Id=$id");
		


		  echo "<script>
		  alert('Successfully Updated');
		  window.location.href='Main.php';
		  </script>";
        
      
}
?>
<?php
//getting id from url

 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM company WHERE Company_Id=$login_user");
 
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
	$pass = $res['Password'];
	$cpass = $res['Confirm_Password'];
	$sq = $res['Security_Question'];
	$sa =$res['Security_Answer'];
    
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
    <?php include "CompanyNav.php"; ?>
        <div class="main-panel">
          <?php include "CompanyHeader.php"; ?>
          
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Update Company Detail</h4></div>
                                <div class="card-content">
                                
                                <!--form-->
                                <form method="post" name="form1" action="updateProfile.php" class="form-horizontal">
                                <div class="form-group">
                                <label class="col-sm-3"for="Company_Name" style="color:
       #000"><strong>Company Name:</strong></label>
                                <div class="col-sm-6">
       							<input type="text" class="form-control" id="Company_Name" name="Company_Name"  value="<?php echo $name; ?>">
                                </div>
                                </div>
                                
                                 
                             
                               
                               
                               <div class="form-group">
                               <label class="col-sm-3"for="Company_Add"style="color:
       #000"><strong>Company Address 1</strong>:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Add" name="Company_Add" value= "<?php echo $add; ?>" >
                               </div>
                               </div>
                               
                               
                                <div class="form-group">
                               <label class=" col-sm-3"for="Company_Add2" style="color:
       #000"><strong>Company Address 2:</strong></label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Add2" name="Company_Add2" value= "<?php echo $add2; ?>" >
                               </div>
                               </div>
                               
                               
                                <div class="form-group">
                               <label class=" col-sm-3"for="Company_City" style="color:
       #000"><strong>Company City:</strong></label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_City" name="Company_City" value= "<?php echo $city; ?>" >
                               </div>
                               </div>
                               
                                
   
                               <div class="form-group">
                               <label class="col-sm-3"for="Company_Posscode" style="color:
       #000"><strong>Company Postcode:</strong></label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Posscode" name="Company_Posscode"  value="<?php echo $posscode; ?>" >
                               </div>
                               </div> 
                               
                               
                               <div class="form-group">
                               <label class="col-sm-3"for="Company_State" style="color:
       #000"><strong>Company State</strong>:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_State" name="Company_State"   value="<?php echo $state; ?>" >
                               </div>
                               </div> 
                               
                                <div class="form-group">
                               <label class="col-sm-3"for="Company_Phone " style="color:
       #000"><strong>Company Phone:</strong></label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Phone" name="Company_Phone"  value="<?php echo $phone; ?>">
                               </div>
                               </div>
                               
                                <div class="form-group">
                               <label class="control-label col-sm-3"for="Company_Fax" style="color:
       #000"><strong>Company Fax No:</strong></label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Fax" name="Company_Fax"  value="<?php echo $fax; ?>">
                               </div>
                               </div>
                               
                               
                               <div class="form-group">
                               <label class="col-sm-3"for="Company_Latitude" style="color:
       #000"><strong>Company Latitude</strong>:</label>
                               <div class="col-sm-6">
                               <input type="text" class="form-control" id="Company_Latitude" name="Company_Latitude"   value="<?php echo $lat; ?>" >
                               </div>
                               </div> 
                               
                               
                              <div class="form-group">
                              <label class="col-sm-3"for="Company_Longtitude" style="color:
       #000"><strong>Company Longtitude:</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Company_Longtitude" name="Company_Longtitude"   value="<?php echo $long; ?>" >
                              </div>
                              </div> 
                              
                               <div class="form-group">
                               <label class="col-sm-3"for="Password" style="color:
       #000"><strong>Password</strong>:</label>
                               <div class="col-sm-6">
                               <input type="password" class="form-control" id="Password" name="Password"   value="<?php echo $pass; ?>" >
                                <h6>
                               <input type="checkbox" onclick="myFunction2()">Show Password
                               </h6>
                               </div>
                               </div> 
                               
                               
                              <div class="form-group">
                              <label class="col-sm-3"for="Confirm_Password" style="color:
       #000"><strong>Comfirm Password:</strong></label>
                              <div class="col-sm-6">
                              <input type="password" class="form-control" id="Confirm_Password" name="Confirm_Password"  value="<?php echo $cpass; ?>" >
                               <h6>
                               <input type="checkbox" onclick="myFunction()">Show Password
                              </h6>
                              </div>
                              </div> 
                              
                               <div class="form-group">
                               <label class=" col-sm-3"for="Security_Question" style="color:
       #000"><strong>Security Question:</strong></label>
                               <div class="col-sm-6">
                               <select class="form-control" id="Security_Question" name="Security_Question">
                              <option selected><?php echo $sq; ?></option>
                              <option>What was your favorite place to visit as a child?</option>
                              <option>What is your favorite movie?</option>
                              <option>What is your favorite color?</option>
                              <option>What high school did you attend?</option>
                              </select>
                               </div>
                               </div> 
                               
                               
                              <div class="form-group">
                              <label class="col-sm-3"for="Security_Answer" style="color:
       #000"><strong>Security Answer:</strong></label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="Security_Answer" name="Security_Answer"   
                              value="<?php echo $sa; ?>" >
                              </div>
                              </div> 
                              
                              
    
                              <input type="hidden" name="Company_Id" value=<?php echo $login_user;?>>
                              <input type="submit" id="update" name="update" value="Update" class="btn btn-default" >
    
                              </form>
                              
                              <script>
function myFunction2() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction() {
    var x = document.getElementById("Confirm_Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

</script>    
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
$("#Password").password();
</script>
<script type="text/javascript">
$("#Confirm_Password").password();
</script>
<script type="text/javascript">
    $(function () {
        $("#update").click(function () {
            var password = $("#Password").val();
            var confirmPassword = $("#Confirm_Password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>