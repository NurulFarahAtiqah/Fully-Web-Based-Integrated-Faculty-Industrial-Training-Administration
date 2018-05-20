
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

include("Check.php");

//getting id from url
$id = $_GET['Student_Id'];

$result2=mysqli_query($db,"CALL c_present_mark('".$_GET['Student_Id']."')");
	
$row2=mysqli_fetch_array($result2);

$result2->close();
$db->next_result();

$tbl .='<h1>Student Presentation Assesment (Faculty Supervisor)</h1>
<body>
<html>
<div> 

<table width="600" height="91" border="1" bordercolor="#000000">
  <tr>
    <td width="200" height="20" ><font color="#000000" >Student Name: &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['Student_Name'].'</font>
    
</td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Supervisor Name : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Supervisor_Name'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Company Name: &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$login_name.'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section A:Preparation</strong></font> </td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >1. Good preparation and use visual aid appropriately</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QA1'].'</font></td>
  </tr> 
  
  <tr>
    <td width="200" height="20"><font color="#000000" ><strong>Total Mark (5):</strong></font> </td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA1'].'</font></td>
  </tr>
  
    <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section B:Presentation</strong></font> </td>
   </tr>

   <tr>
    <td width="200" height="20"><font color="#000000" >1. Presentation style</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QB1'].'</font></td>
   </tr>
   
  
    <tr>
    <td width="200" height="20"><font color="#000000" >2. Confidence and energetic presentation</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QB2'].'</font></td>
   </tr>
   
   
    <tr>
    <td width="200" height="20"><font color="#000000" >3.Well organize and structured presentation.</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QB3'].'</font></td>
    </tr>
	
	<tr>
    <td width="200" height="20"><font color="#000000" >4. Fluency of the delivery</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QB4'].'</font></td>
    </tr>
	
	<tr>
    <td width="200" height="20"><font color="#000000" >5. Clear and understandable presentation</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QB5'].'</font></td>
    </tr>
    
	 <tr>
    <td width="200" height="20"><font color="#000000" ><strong>Total Mark (50):</strong></font> </td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['TB'].'</font></td>
  </tr>
 
 
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section C:Content</strong></font> </td>
   </tr>

   <tr>
    <td width="200" height="20"><font color="#000000" >1. Intoduction</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QC1'].'</font></td>
   </tr>
   
  
    <tr>
    <td width="200" height="20"><font color="#000000" >2. Description of the implemented task(s)/project(s)</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QC2'].'</font></td>
   </tr>
   
   
    <tr>
    <td width="200" height="20"><font color="#000000" >3. Conclusion</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QC3'].'</font></td>
    </tr>
	
  <tr>
    <td width="200" height="20"><font color="#000000" >Total Mark (35): </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['TC'].'</font></td>
  </tr>
  
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section D:QUESTION and ANSWER</strong></font> </td>
   </tr>

   <tr>
    <td width="200" height="20"><font color="#000000" >1. Understand question well</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QD1'].'</font></td>
   </tr>
   
  
    <tr>
    <td width="200" height="20"><font color="#000000" >2. Pay attention to the questions</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QD2'].'</font></td>
   </tr>
   
   
    <tr>
    <td width="200" height="20"><font color="#000000" >3. Answer question calmly and confidently</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QD3'].'</font></td>
    </tr>
	
	 <tr>
    <td width="200" height="20"><font color="#000000" >4. Answers given satisfactory</font> </td>
    <td width="400" height="20"><font color="#000000" > '.$row2['QD4'].'</font></td>
    </tr>
	
  <tr>
    <td width="200" height="20"><font color="#000000" >Total Mark (10): </font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['TD'].'</font></td>
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
