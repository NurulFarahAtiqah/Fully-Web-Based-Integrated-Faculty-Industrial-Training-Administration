
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

$result2=mysqli_query($db,"CALL report_Mark('".$_GET['Student_Id']."')");
	
$res=mysqli_fetch_array($result2);

$result2->close();
$db->next_result();

if($res['TA4']==0)
{
	$x = $res['TA42'];
}
else if ($res['TA42']==0)
{
	$x = $res['TA4'];
}

$tbl .='<h1>Student Report Assesment (Faculty Supervisor)</h1>
<body>
<html>
<div> 

<table width="600" height="91" border="1" bordercolor="#000000">
  <tr>
    <td width="200" height="20" ><font color="#000000" >Student Name: &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" >  '.$res['Student_Name'].'</font>
    
</td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Supervisor Name : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$login_name.'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Company Name : &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$res['Company_Name'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section A:REPORT CONTENT</strong></font> </td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>1. ABSTRACT
								<ul>
                                  <li>Place</li>
                                  <li>Work and work result during internship</li>
                                  <li>Conclude about the task done meet the objective of the internhsip</li>
                                </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong></font> </td>
    <td width="200" height="20"><font color="#000000" >  '.$res['QA1'].'</font></td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>2. INTRODUCTION
								<ul>
                                  <li>Internship Company</li>
                                  <li>Internship Objective</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong></font></td>
    <td width="200" height="20"><font color="#000000" > '.$res['QA2'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>3.COMPANY BACKGROUND
								<ul>
                                  <li>Company History</li>
                                  <li>Business Orientation</li>
                                  <li>Company Organization Chart </li>
                                  <li>Company Function</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="20"><font color="#000000" > '.$res['QA3'].'</font></td>
  </tr>
<tr>
    <td width="600" height="20"><font color="#000000" ><strong>4. PROJECT DESCRIPTION
								<ul>
                                  <li>Problem Statement</li>
                                  <li>Task Specification</li>
                                  <li>Implementation and Solve Method </li>
                                  <li>Work Result</li>
                                  <li>The Goodness and Weakness of The Task Result including a proposal to improve</li>
                                  <li>Skill, Knowledge and Experiences obtained during Internship</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$x.'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>5. CONCLUSION
									<ul>
                                  <li>- Contribution student to the organization</li>
                                  <li>(
The significance of the completed tasks and the ideas, the solutions that bring repairs to the organization.)</li>
                                 <li>- Conclusion</li>
                                 <li>(The task that have been done achieve the objective of the Internships.)</li>
                                </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['QA5'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>6. APPENDIX
									<ul>
                                  <li>- In accordance with the task field being run.</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['QA6'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>7. QUALITY CONTENT
									 <ul>
                                  <li>- The overall content of the report consistent with the content of the log book</li>
                                  <li>- Need to be support with document attached. As example DFD, ERD and Flow Chart</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['QA7'].'</font></td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Total Mark Part A (60):</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['TAF'].'</font></td>
  </tr>
    <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section B:REPORT PRESENTATION</strong></font> </td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>1. LANGUAGE QUALITY
								<ul>
                                  <li>- Good Word Structure</li>
                                  <li>- Facts Accuracy</li>
                                  <li>- Good Use Of English</li>
                                </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong></font> </td>
    <td width="200" height="20"><font color="#000000" >  '.$res['QB1'].'</font></td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>2. PRESENTATION QUALITY
								<ul>
                                  <li>- Using appropriate diagrams in describing and supporting report content</li>
                            	</ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong></font></td>
    <td width="200" height="20"><font color="#000000" > '.$res['QB2'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>3.NEATNESS
								  <ul>
                                  <li>- Written easily to understand</li>
                                  <li>- Minimum type error</li>
                                  <li>- Arrangement of diagram and table</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="20"><font color="#000000" > '.$res['QB3'].'</font></td>
  </tr>
<tr>
    <td width="600" height="20"><font color="#000000" ><strong>4. REPORT FORMAT
								   <ul>
                                  <li>- Title Page</li>
                                  <li>- Appreciation</li>
                                  <li>- Abstract</li>
                                  <li>- List Of Content</li>
                                  <li>- Table Register</li>
                                  <li>- Diagram Register</li>
                                  <li>- Acronym Register</li>
                                  <li>- Report Text</li>
                                  <li>- Reference</li>
                                  <li>- Appendix</li>
                                 </ul></strong></font> </td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Mark:</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['QB4'].'</font></td>
  </tr>
  <tr>
    <td width="400" height="20"><font color="#000000" ><strong>Total Mark B(10):</strong> </font></td>
    <td width="200" height="10"><font color="#000000" > '.$res['TBF'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section C:OVERALL COMMENTS</strong></font> </td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >Overall Comments: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$res['QC1'].'</font></td>
  </tr>
  
 
  
</table>
<p>&nbsp;</p>



	

</body>
</html>
         
';


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output('asessment.pdf', 'I');
?>
</body>
</body>
</html>
