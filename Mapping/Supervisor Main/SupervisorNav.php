 <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

<?php

$query = "SELECT semester_session FROM session ORDER BY Session_Id DESC";
 $result1 = mysqli_query($db, $query);
 $options = "";
while($row2 = mysqli_fetch_array($result1))
{
	 if ($_SESSION["semsesi"] == $row2[0])
	 	$options = $options."<option selected>$row2[0]</option>";
	else
	    $options = $options."<option>$row2[0]</option>";
}

?>

<style>
.sidebar[data-color="red"]  {
    background-color: #FFF;
    box-shadow: 0 12px 20px -10px rgba(244, 67, 54, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(244, 67, 54, 0.2);	
}

.sidebar[data-image]:after,
.sidebar.has-image:after,
.off-canvas-sidebar[data-image]:after,
.off-canvas-sidebar.has-image:after {
    opacity: .77;
}

li
{
	list-style:none;
}



</style>



<div class="sidebar" data-color="purple" data-image="../icon/sidebar.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="sidebar-wrapper">
        <ul class="nav">
        
        
                    <div class="logo">
                         <h6 class="text-center"><strong><?php echo $login_name; ?></strong></h6> 
                         <h6 class="text-center"><strong>Role : <?php echo $role; ?></strong></h6>
                          <h6 class="text-center"><strong>
              <select onchange="setSemsesi(this.value);" id="semester_session" required name="semester_session">
                     <?php echo $options;?>
              </select>
              </strong></h6> 
             
                    </div>
                    
                    
                    
                    <li>
                        <a href="../Supervisor Main/SupervisorMain.php">
                            <i class="material-icons">dashboard</i>
                            <p>Profile</p>
                        </a>
                    </li>
                    
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                                <i class="material-icons">people</i>
                                <p>Supervisor Assignment</p>
                            </a>
                            
                            
                            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                            
                            <br />
                              <li>
                                    <a href="../Supervisor Main/SupervisorPre.php">Preference State</a>
                             </li>
                             <br />
                            
                               <li>
                                      <a href="../Supervisor Main/ViewStudentAttachmentMap.php">Student Attachment</a>
                                </li>
                                <br />
                                
                                 <li>
                                  
                                        <a href="../Supervisor Main/ViewAllList.php">All Internship</a>
                                  </li>
                                  <br /> 
                                  
                                  <li>
                                  
                                        <a href="../Supervisor Main/viewPreEvaluation.php">First Visit Report</a>
                                  </li>
                                  <br />
                                  
                                 
                                 
                            </ul>
                        </li><!--2-->
                    
                     
                    
                    
                    
                    
                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages1" data-parent="#exampleAccordion">
                                <i class="material-icons">dialpad</i>
                                <p>Student Assessment</p>
                            </a>
                            
                            
                            <ul class="sidenav-second-level collapse" id="collapseExamplePages1">
                            
                            <br />
                              <li>
                                      <a href="../Supervisor Main/view_Atitude.php">CheckList Assessment<br /><label style=" font-size:13px; font-weight:bold; padding-left:50px;">BITU 3926</label></a>
                             </li>
                           <br />
                            <li>
                                    <a href="../Supervisor Main/view_ass.php">Internship Assessment<label style=" font-size:13px; font-weight:bold; padding-left:50px;">BITU 3926</label></a>
                             </li>
                           <br />
                            <li>
                                    <a href="../Supervisor Main/view_log.php">Logbook Assessment<label style=" font-size:13px; font-weight:bold; padding-left:50px;">BITU 3926</label></a>
                             </li>
                           <br />
                            <li>
                                    <a href="../Supervisor Main/view_rep.php">Report Assessment<label style=" font-size:13px; font-weight:bold; padding-left:50px;">BITU 3946</label></a>
                             </li>
                           <br />
                            <li>
                                    <a href="../Supervisor Main/view_pres.php">Presentation Assessment<label style=" font-size:13px; font-weight:bold; padding-left:50px;">BITU 3946</label></a>
                             </li>
                           <br />
                             <li>
                                    <a href="../Supervisor Main/ViewMarkObe.php">OBE Mark</a>
                                  
                             </li>
                           <br />
                                
                            </ul>
                        </li><!--2-->
                    
            
                    
                     <li>
                     <a href="../Supervisor Main/FeedbackView.php">
                     <i class="material-icons">bookmark</i>
                     <p>Student Feedback Form</p>
                     </a>
                    </li>
                    
                    
                    
                     <li>
                     <a href="../Supervisor Main/viewLi.php">
                     <i class="material-icons">verified_user</i>
                     <p>End Internship Letter</p>
                     </a>
                    </li>  
                    
                    
                </li>
                </ul>
            </div>
        </div>
        <script>
function setSemsesi(ss)
{
	window.location.href = 'semsesi.php?semsesi='+ss;
}
</script>
