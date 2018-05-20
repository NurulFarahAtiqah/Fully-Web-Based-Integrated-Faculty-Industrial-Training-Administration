
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
     <div class="sidebar" data-color="red" data-image="../icon/ftmk.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->  <div class="sidebar-wrapper">
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
            
           
                    
                    <li> <!--1-->
                        <a href="../Main/Dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li> <!--1-->
                    
                   

                    
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                                <i class="material-icons">people</i>
                                <p>Student Placement</p>
                            </a>
                            
                            
                            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                            
                            <br />
                              <li>
                                    <a href="../Student/View_Student.php">Student</a>
                             </li>
                             <br />
                            
                               <li>
                                      <a href="../Company/View_CompanyALL.php">Company</a>
                                </li>
                                <br />
                                
                                 <li>
                                  
                                        <a href="../Lecturer/View_Supervisor.php">Supervisor</a>
                                  </li>
                                  <br /> 
                                  
                                  <li>
                                        <a href="../Student/view_SA2017.php">Student Attachment</a>
                                 </li>
                                 <br />
                                 <li>
                                        <a href="../Mapping/View_Company_Grouping.php">Company Grouping</a>
                                 </li>
                                 <br />
                                  <li>
                                        <a href="../Mapping/Supervisor_Attachment.php">Supervisor Assignment</a>
                                 </li>
                                 <br />
                                 
                            </ul>
                        </li><!--2-->
                    
                    
                       <li> <!--5-->
                            <a href="../Mapping/View_Map.php">
                                <i class="material-icons">location_on</i>
                                <p>Maps</p>
                            </a>
                        </li> <!--5-->
                        
                        
                             <li> <!--1-->
                             <a href="../Main/ViewAll.php">
                             <i class="material-icons">next_week</i>
                             <p>View All Internship</p>
                             </a>
                            </li> <!--1-->
                    
                      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages1" data-parent="#exampleAccordion">
                                <i class="material-icons">dialpad</i>
                                <p>Student Assessment</p>
                            </a>
                            
                            
                            <ul class="sidenav-second-level collapse" id="collapseExamplePages1">
                            
                            <br />
                              <li>
                                    <a href="../Main/OBE.php">OBE Mark</a>
                             </li>
                           <br />
                                
                            </ul>
                        </li><!--2-->
                               
      
                               
                      </ul><!--nav-->    
            </div>
        </div>
<script>
function setSemsesi(ss)
{
	window.location.href = '../semsesi.php?semsesi='+ss;
}
</script>