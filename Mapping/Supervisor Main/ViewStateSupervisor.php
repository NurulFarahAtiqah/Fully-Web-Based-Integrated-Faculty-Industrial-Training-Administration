<?php

include("SupervisorCheck.php"); 
//getting id from url
$id = $login_id;
 
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT * FROM sv_state WHERE Supervisor_Id = "'.$id.'"');

while($res = mysqli_fetch_array($result))
{
	
	$s1 = $res['State1'];
	$s2 = $res['State2'];
	$s3 = $res['State3'];
	
}
	
	if(mysqli_num_rows($result)==0)
	{
		echo "<script>
alert('Please Submit The State Preference Form.');
window.location.href='SupervisorPre.php';
</script>";
	
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
</head>

<body>
    <div class="wrapper">
    <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
          
          
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title"><?php echo $login_name; ?></h4>
                                  
                                </div>
                                <div class="card-content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5">
                                             <div class="form-group label-floating">
                                            
                                          <div class="row">
                                          <div class="col-md-12">
                                          <div class="form-group label-floating">
                                          <label class="control-label">Preference State Option 1</label>
                                          <input type="text" class="form-control" id="State1" name="State1" value="<?php echo $s1; ?>" disabled="disabled">

                                          </div>
                                          </div>
                                          </div>
                                            
                                            
                                          <div class="row">
                                          <div class="col-md-12">
                                          <div class="form-group label-floating">
                                          <label class="control-label">Preference State Option 2</label>
                                          <input type="text" class="form-control" id="State2" name="State2" value="<?php echo $s2; ?>" disabled="disabled">

                                           </div>
                                           </div>
                                           </div>
                                        
                                        
                                           <div class="row">
                                           <div class="col-md-12">
                                           <div class="form-group label-floating">
                                           <label class="control-label">Preference State Option 3</label>
                                           <input type="text" class="form-control" id="State3" name="State3" value="<?php echo $s3; ?>" disabled="disabled">

                                            </div>
                                            </div> 
                                            </div>
                                          
                                             
                                       
 <div class="clearfix"></div>
                                    </form>
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