 <?php
 include("SupervisorCheck.php");   
       
          if(isset($_GET['Student_Id'])){
             
              $query ='INSERT INTO notification (Student_Id, Supervisor_Id, Message, Status, Time,Type) VALUES ("'.$_GET['Student_Id'].'", "'.$login_id.'", "", "unread", CURRENT_TIMESTAMP,"end_letter")';
               $result = mysqli_query($db, $query);
			   echo "<script>
		  alert('Notified');
		  window.location.href='viewLi.php';
		  </script>"; 
          }
          
 ?>