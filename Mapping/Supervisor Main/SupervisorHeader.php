 <style>
 .navbar.navbar-transparent {
    background-color:#fefefe;
    box-shadow: none;
    border-bottom: 0;
}

.navbar .dropdown-menu li a:hover,
.navbar .dropdown-menu li a:focus,
.navbar .dropdown-menu li a:active,
.navbar.navbar-default .dropdown-menu li a:hover,
.navbar.navbar-default .dropdown-menu li a:focus,
.navbar.navbar-default .dropdown-menu li a:active {
    background-color:#999;
    color: #FFFFFF;
    box-shadow: 0 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);
}

</style>


<nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Supervisor </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons" style="font-size:35px;">notifications</i>
                                        <?php
										$query = "SELECT * FROM notification where Status = 'unread' AND Supervisor_Id='$login_id' AND (Type='SV_Feedback' OR Type='SV_Pre_Evaluation' OR Type='SV_end_letter') ORDER BY Time DESC";
										$result1 = mysqli_query($db,$query);
										if(mysqli_num_rows($result1)>0){
										?>
										<span class="badge badge-light" style="background-color:#F00"><?php echo mysqli_num_rows($result1); ?></span>
									    <?php
										}
                    					?>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                  
                                  <?php
									  $query1 = "SELECT notification.*,student.Student_Name from notification inner join student on notification.Student_Id = student.Student_Id WHERE Supervisor_Id='$login_id' AND (Type='SV_Feedback' OR Type='SV_Pre_Evaluation' OR Type='SV_end_letter') ORDER BY Time DESC";
									  $result2 = mysqli_query($db,$query1);
									   if(mysqli_num_rows($result2)>0){
										   while($row = mysqli_fetch_array($result2))
        									{
									  ?>
                                   <li> <a style ="
                                               <?php
                                                  if($row['Status']=='unread'){
                                                      echo "font-weight:bold;";
                                                  }
                                               ?>
                                               " 
                                               
											   <?php  
                                                if($row['Type']=='SV_Pre_Evaluation'){
                                          		echo 'href="viewPreEvaluation.php?ID='.$row['ID'].';">';
                                      			}
									  		   else  if($row['Type']=='SV_Feedback'){
                                               echo 'href="FeedbackView.php?ID='.$row['ID'].';">';
                                               }
											    else if($row['Type']=='SV_end_letter'){
                                          		echo 'href="viewLi.php?ID='.$row['ID'].';">';
                                                }
                                              
											   ?>
                                      <small><i><?php echo date('F j, Y, g:i a',strtotime($row['Time'])) ?></i></small><br/>
                                        <?php 
                                        
                                    
									  if($row['Type']=='SV_Pre_Evaluation'){
                                          echo ''.$row['Student_Name'].' Submit The First Visit Report.';
                                      }
									  else if($row['Type']=='SV_Feedback'){
                                          echo ''.$row['Student_Name'].' Submit The Feedback Form.';
                                      }
									    else if($row['Type']=='SV_end_letter'){
                                          echo ''.$row['Student_Name'].' Submit The Confirmation End Internship Letter.';
                                      }
									
								
                                        ?>
                                      </a></li>
                                      
                                    <div class="dropdown-divider"></div>
                                      <?php
                                           }
                                       }else{
                                           echo "No Records yet.";
                                       }
                                           ?>
                                     
                                   
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons"  style="font-size:35px;">account_box</i>
                                    <p class="hidden-lg hidden-md">Account</p>
                                </a>
                                <ul class="dropdown-menu">
                                   
                                    <li>
                                        <a href="../Connections/Logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                         <form class="navbar-form navbar-right" role="search">
                       </form>
                    </div>
                </div>
            </nav>