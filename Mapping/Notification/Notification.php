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
    <title>pdf</title>
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
                                    <h4 class="title">Add New Notification/Announcement</h4>
                                 </div>
                                 
                               
                                 <nav class="navbar navbar-default">
                                 <div class="container-fluid">
                             
                		        <button type="submit" name="add" id="add"  class="btn btn-danger navbar-btn pull-left">Add</button>
                             
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
    <h4 class="modal-title">New Notification/Announcement</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" >
     <p><label>Announcement For:</label>
   	  <select class="form-control" id="For" name="For">
      <option selected>Please Choose</option>
      <option value="All">Supervisor,Student,Company</option>
      <option value="Company">Company</option>
      <option value="Supervisor">Supervisor</option>
      <option value="Student">Student</option>
      </select>
      <br>
      <label>Announcement:</label>
   	  <textarea class="form-control" rows="5" id="Message" name="Message" placeholder="Input Here"></textarea>
      
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
   url:"addNoti.php",
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
  $('.modal-title').text("New Announcement/Notification");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var For = $('#For').val();
  var Message = $('#Message').val();
  if(For == ' ' && Message == ' ')
  {
   alert("Please Add Announcement/Notification");
   return false;
  }
  else
  {
   
    $.ajax({
     url:"addNoti.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   
  }
 });

 
 $(document).on('click', '.update', function(){
  $('#time_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Announcement/Notification");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var time_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this from database?"))
  {
   $.ajax({
    url:"addNoti.php",
    method:"POST",
    data:{time_id:time_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
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