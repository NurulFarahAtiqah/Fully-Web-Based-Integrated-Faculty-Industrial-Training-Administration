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
              
             
            </div>     
            
           
                   <li>
                        <a href="StudentMain.php">
                            <i class="material-icons">dashboard</i>
                            <p>Profile</p>
                        </a>
                    </li>
                     
                    		   
                    
                    <li>
                     <a href="InternView.php">
                     <i class="material-icons">book</i>
                     <p>Internship Details<br /><label style=" font-size:13px; font-weight:bold;">Maklumat Latihan Industri</label></p>
                     </a>
                    </li>
                    
                    <li>
                     <a href="SVDetails.php?">
                     <i class="material-icons">person pin</i>
                     <p>Supervisor Details<br /><label style=" font-size:13px; font-weight:bold;">Maklumat Penyelia</label></p>
                     </a>
                    </li>
                    
                     <li>
                     <a href="ViewCompanyDetails.php">
                     <i class="material-icons">assignment ind</i>
                     <p>Company Details<br /><label style=" font-size:13px; font-weight:bold; ">Maklumat Syarikat</label></p>
                     </a>
                     
                    </li>
                      <li>
                    <a href="ViewFeedback.php">
                        <i class="material-icons">bookmark</i>
                        <p>Feedback Form <br /><label style=" font-size:13px; font-weight:bold;">Borang Maklum Balas</label></p>
                    </a>
                     </li>
                     
                     <li>
                     <a href="upload1.php">
                     <i class="material-icons">verified_user</i>
                     <p>End Internship Letter<br /><label style=" font-size:13px; font-weight:bold;">Borang Perakuan Tamat Li</label></p>
                     </a>
                    </li>
                    
                   
                     
                     
                   
                    
                     
              </ul><!--nav-->    
            </div>
        </div>
        
        
      