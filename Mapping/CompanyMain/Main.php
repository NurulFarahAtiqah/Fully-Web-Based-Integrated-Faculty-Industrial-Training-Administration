<?php
include("Check.php"); 
//getting id from url
$id = $login_user;
 
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT * FROM company WHERE Company_Id= "'.$id.'"');
 
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
    <title>Company Main</title>
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
                
                 <div class="col-md-2">
               <img src="../icon/an.png" width="50px" height="50px">
                </div>
                
                 <div class="col-md-10">
                 
  <?php
  
  $result2 = mysqli_query($db, "SELECT * FROM anouncement WHERE User='All' OR User='Company'");
   while($row = mysqli_fetch_array($result2))
{
	  $msg = $row['Message'];
	  
	  
	  echo '<h5 class="mySlides w3-animate-top ">'; 
	  echo $msg;
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
                                    <form>
                                        <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group label-floating">
                                        <label class="control-label">Company Id</label>
                                        <input type="text" class="form-control" value="<?php echo $id; ?>" disabled>
                                        </div> 
                                        </div>
                                       
                                         <div class="col-md-9">
                                         <div class="form-group label-floating">
                                          <label class="control-label">Company Name</label>
                                          <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                                          </div>
                                          </div>
                                          </div>
                                          
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo $phone; ?>" disabled>
                                            </div>
                                            </div> 
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Fax Number</label>
                                            <input type="text" class="form-control" value="<?php echo $fax; ?>" disabled>
                                            </div>
                                            </div> 
                                            </div>
                                          
                                          <div class="row">
                                          <div class="col-md-6">
                                          <div class="form-group label-floating">
                                           <label class="control-label">Address 1</label>
                                           <input type="text" class="form-control" value="<?php echo $add; ?>" disabled>
                                           </div>
                                           </div>
                                           
                                           
                                           
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Address 2</label>
                                            <input type="text" class="form-control" value="<?php echo $add2; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div class="row">
                                          <div class="col-md-4">
                                          <div class="form-group label-floating">
                                           <label class="control-label">Posscode</label>
                                           <input type="text" class="form-control" value="<?php echo $posscode; ?>" disabled>
                                           </div>
                                           </div>
                                           
                                           
                                          <div class="col-md-4">
                                          <div class="form-group label-floating">
                                           <label class="control-label">City</label>
                                           <input type="text" class="form-control" value="<?php echo $city; ?>" disabled>
                                           </div>
                                           </div>
                                           
                                           
                                           
                                            <div class="col-md-4">
                                            <div class="form-group label-floating">
                                            <label class="control-label">State</label>
                                            <input type="text" class="form-control" value="<?php echo $state; ?>" disabled>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            
                                              <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Latitude</label>
                                            <input type="text" class="form-control" value="<?php echo $lat; ?>" disabled>
                                            </div>
                                            </div> 
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Longtitude</label>
                                            <input type="text" class="form-control" value="<?php echo $long; ?>" disabled>
                                            </div>
                                            </div> 
                                            </div>
                                          
                                          
                                          
                                            
                                            
                                             <a class="btn btn-primary" href="updateProfile.php?Company_Id=<?php echo $id; ?>">Edit</a>
                                             
                                       
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

