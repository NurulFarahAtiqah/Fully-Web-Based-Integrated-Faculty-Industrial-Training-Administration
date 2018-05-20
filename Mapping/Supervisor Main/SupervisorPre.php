<?php
 include("SupervisorCheck.php"); 
 
 $query1 = "SELECT * FROM sv_state WHERE Supervisor_Id = $login_id;";
$result1 = mysqli_query($db,$query1);

if(mysqli_fetch_array($result1) != NULL)
{
	 $disabled = 'disabled="disabled"';
}
else
{
	 $disabled = "";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Time</title>
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
          
             <div class="col-md-12">
                 
  <?php
  
    $result2 = mysqli_query($db, "SELECT time FROM time WHERE type='Supervisor State Preference'");
    

if(mysqli_num_rows($result2)==0)
{
	  
	  
	  echo '<h5>'; 
	  echo '';
	  echo'</h5>';
}
else
{
	  $row = mysqli_fetch_array($result2);
      $time = $row['time'];
	  
	  
	  echo '<label class="alert" style="margin-left:300px">'; 
	  
	  echo 'Please submitted the state preference before: '.$time;
	
	  echo'</label>';
	
}
    
  ?>
  </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Insert State Preference</h4>
                                 </div>
                                 
                               
                                 <nav class="navbar navbar-default">
                                <div class="container-fluid">
                             
                		        <button type="submit" name="add" id="add"  class="btn btn-danger navbar-btn pull-left" <?php echo $disabled;?>> Insert State Preference</button>
                             
                                </div>
                                
                                <div class="card-content table-responsive"> 
             
             	
                 					   <div id="image_data">
            
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

<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add State Preference</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" enctype="multipart/form-data">
      <label>Preference State Option 1</label>
                                   <select class="form-control" id="State1" name="State1">
                                    <option selected>Choose State</option>
                                    <option value="MELAKA">MELAKA</option>
                                    <option value="PERAK">PERAK</option>
                                    <option value="JOHOR">JOHOR</option>
                                    <option value="N.SEMBILAN">N.SEMBILAN</option>
                                    <option value="SELANGOR">SELANGOR</option>
                                    <option value="KUALA LUMPUR">KUALA LUMPUR</option>
                                    <option value="PULAU PINANG">PULAU PINANG</option>
                                    <option value="KEDAH">KEDAH</option>
                                    <option value="PERLIS">PERLIS</option>
                                    <option value="PAHANG">PAHANG</option>
                                    <option value="TERENGGANU">TERENGGANU</option>
                                    <option value="KELANTAN">KELANTAN</option>
                                    <option value="SABAH">SABAH</option>
                                    <option value="SARAWAK">SARAWAK</option>
                                 </select>
      <br>
   <label>Preference State Option 2</label>

                                   <select class="form-control" id="State2" name="State2">
                                    <option selected>Choose State</option>
                                    <option value="MELAKA">MELAKA</option>
                                    <option value="PERAK">PERAK</option>
                                    <option value="JOHOR">JOHOR</option>
                                    <option value="N.SEMBILAN">N.SEMBILAN</option>
                                    <option value="SELANGOR">SELANGOR</option>
                                    <option value="KUALA LUMPUR">KUALA LUMPUR</option>
                                    <option value="PULAU PINANG">PULAU PINANG</option>
                                    <option value="KEDAH">KEDAH</option>
                                    <option value="PERLIS">PERLIS</option>
                                    <option value="PAHANG">PAHANG</option>
                                    <option value="TERENGGANU">TERENGGANU</option>
                                    <option value="KELANTAN">KELANTAN</option>
                                    <option value="SABAH">SABAH</option>
                                    <option value="SARAWAK">SARAWAK</option>
                                    </select>
									<br>
  <label>Preference State Option 3</label>
                                                          <select class="form-control" id="State3" name="State3">
                                                           <option selected>Choose State</option>
                                                          <option value="MELAKA">MELAKA</option>
                                                          <option value="PERAK">PERAK</option>
                                                          <option value="JOHOR">JOHOR</option>
                                                          <option value="N.SEMBILAN">N.SEMBILAN</option>
                                                          <option value="SELANGOR">SELANGOR</option>
                                                          <option value="KUALA LUMPUR">KUALA LUMPUR</option>
                                                          <option value="PULAU PINANG">PULAU PINANG</option>
                                                          <option value="KEDAH">KEDAH</option>
                                                          <option value="PERLIS">PERLIS</option>
                                                          <option value="PAHANG">PAHANG</option>
                                                          <option value="TERENGGANU">TERENGGANU</option>
                                                          <option value="KELANTAN">KELANTAN</option>
                                                          <option value="SABAH">SABAH</option>
                                                          <option value="SARAWAK">SARAWAK</option>
                                                       </select>
									<br>
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="time_id" id="time_id" />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
      
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"StateSave.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add State Preference");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var s1 = $('#State1').val();
  var s2 = $('#State2').val();
  var s3 = $('#State3').val();
  if(s1== ' ' && s2 == ' '&& s3 == ' ')
  {
   alert("Please Insert State Preference");
   return false;
  }
  else
  {
   
    $.ajax({
     url:"StateSave.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
	   window.location.reload();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   
  }
 });
 
 $(document).on('click', '.update', function(){
  $('#time_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update State Preference");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var time_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this preference from database?"))
  {
   $.ajax({
    url:"StateSave.php",
    method:"POST",
    data:{time_id:time_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
	  window.location.reload();
    }
   })
  }
  else
  {
   return false;
  }
 });
});  
</script>