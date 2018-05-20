
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<?php
    





require_once('C:xampp\htdocs\Mapping\tcpdf\tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->SetFont('helvetica', 'B', 20);


$pdf->AddPage();

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

$pdf->SetCreator(PDF_CREATOR);

include("SupervisorCheck.php");

//getting id from url
$id = $_GET['Student_Id'];

$result2=mysqli_query($db,"SELECT pre_evaluation.*, company.Company_Name, supervisor.Supervisor_Name,student.Student_Name,student.Student_Course,student.semester_session,company.Company_Phone FROM student INNER JOIN stud_attachment ON stud_attachment.Student_Id =student.Student_Id INNER JOIN company ON company.Company_Id = stud_attachment.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id INNER JOIN pre_evaluation ON pre_evaluation.Student_Id = student.Student_Id WHERE student.Student_Id='".$_GET['Student_Id']."'");
	
$row2=mysqli_fetch_array($result2);

$result2->close();
$db->next_result();

$tbl .='<h1>First Visit Report</h1>
<body>
<html>
<div> 

<table width="600" height="91" border="1" bordercolor="#000000">
 <tr>
    <td width="200" height="20"><font color="#000000" >Semester/Session : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Student_Course'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="20" ><font color="#000000" >Student Name: &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['Student_Name'].'</font>
    
</td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >Student Course : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Student_Course'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Supervisor Name : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$login_name.'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Company Name : &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Company_Name'].'</font></td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >Company Phone No : &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Company_Phone '].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>A.	Task / Project / Assignment</strong></font> </td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >I.	Technical Task</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q1'].'</font></td>
  </tr> 
    <tr>
    <td width="200" height="20"><font color="#000000" >II.	Administrative Task</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q2'].'</font></td>
  </tr> 
  

  
    <tr>
    <td width="600" height="20"><font color="#000000" ><strong>B.	Suitability of Training Organization</strong></font> </td>
   </tr>

   <tr>
    <td width="200" height="20"><font color="#000000" > I.	Working Environment</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q3'].'</font></td>
   </tr>
   
  
    <tr>
    <td width="200" height="20"><font color="#000000" >II.	Facilities for the students</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q4'].'</font></td>
   </tr>
   
   
    <tr>
    <td width="200" height="20"><font color="#000000" >III.	Problems and Opportunities</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q5'].'</font></td>
    </tr>
	
	<tr>
    <td width="200" height="20"><font color="#000000" >Is it suitable for the Industrial Training placement?</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q6'].'</font></td>
    </tr>
	
	<tr>
    <td width="200" height="20"><font color="#000000" >If NO, please state your reason:</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Q7'].'</font></td>
    </tr>
    
	
   
  
</table>
<p>&nbsp;</p>



	

</body>
</html>
         
';


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output('presentationmark.pdf', 'I');
?>
</body>
</body>
</html>
