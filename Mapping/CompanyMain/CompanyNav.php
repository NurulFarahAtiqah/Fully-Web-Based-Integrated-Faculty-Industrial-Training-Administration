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
                          <h6 class="text-center"><strong>
              <select onchange="setSemsesi(this.value);" id="semester_session" required name="semester_session">
                     <?php echo $options;?>
              </select>
              </strong></h6> 
                    </div>
                    
                    
                    
                    <li>
                        <a href="../CompanyMain/Main.php">
                            <i class="material-icons">dashboard</i>
                            <p>Profile</p>
                        </a>
                    </li>
                    
                  
                     <li>
                     <a href="../CompanyMain/viewStudet.php">
                     <i class="material-icons">person pin</i>
                     <p>Student Detail</p>
                     </a>
                    </li>
                    
                    
                     <li> <!--2-->
                            <a href="../CompanyMain/view_Ass.php">
                                <i class="material-icons">description</i>
                                <p>Internship Assesment</p>
                            </a>
                        </li><!--2-->
                    
                   
                    
                     <li> <!--2-->
                            <a href="../CompanyMain/view_Press.php">
                                <i class="material-icons">question_answer</i>
                                <p>Presentation Assesment</p>
                            </a>
                        </li><!--2-->
                    
                    
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