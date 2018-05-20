<?php
 include("../Connections/Check.php"); 

$NOTNULL = $db -> query("SELECT student.Student_Id FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id WHERE sv_assignment.Supervisor_Id IS NOT NULL AND student.semester_session = '$session'");
$NULL = $db -> query("SELECT student.Student_Id FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id WHERE sv_assignment.Supervisor_Id IS NULL AND student.semester_session = '$session'");

$totalNOTNULL = mysqli_num_rows($NOTNULL);
$totalNULL = mysqli_num_rows($NULL);


$companymarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN sv_mark  ON student.Student_Id = sv_mark.Student_Id WHERE sv_mark.time_submit IS NOT NULL AND student.semester_session = '$session'");
$companymark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN sv_mark  ON student.Student_Id = sv_mark.Student_Id WHERE sv_mark.time_submit IS NULL AND student.semester_session = '$session'");

$totalcompanymarkdone = mysqli_num_rows($companymarkdone);
$totalcompanymark = mysqli_num_rows($companymark);

$reportmarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN report ON student.Student_Id = report.Student_Id WHERE report.time_submit IS NOT NULL AND student.semester_session = '$session'");
$reportmark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN report ON student.Student_Id = report.Student_Id WHERE report.time_submit IS NULL AND student.semester_session = '$session'");

$totalreportmarkdone = mysqli_num_rows($reportmarkdone);
$totalreportmark = mysqli_num_rows($reportmark);

$svpresentmarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN present_mark ON student.Student_Id = present_mark.Student_Id WHERE present_mark.time_submit IS NOT NULL AND student.semester_session = '$session'");
$svpresentmark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN present_mark ON student.Student_Id = present_mark.Student_Id WHERE present_mark.time_submit IS  NULL AND student.semester_session = '$session'");

$totalsvpresentmarkdone = mysqli_num_rows($svpresentmarkdone);
$totalsvpresentmark = mysqli_num_rows($svpresentmark);


$logbookmarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN logbook_mark ON student.Student_Id = logbook_mark.Student_Id WHERE logbook_mark.time_submit IS NOT NULL AND student.semester_session = '$session'");
$logbookmark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN logbook_mark ON student.Student_Id = logbook_mark.Student_Id WHERE logbook_mark.time_submit IS NULL AND student.semester_session = '$session'");

$totallogbookmarkdone = mysqli_num_rows($logbookmarkdone);
$totallogbookmark = mysqli_num_rows($logbookmark);

$cpresentmarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN c_present_mark ON student.Student_Id = c_present_mark.Student_Id WHERE c_present_mark.time_submit IS NOT NULL AND student.semester_session = '$session'");
$cpresentmark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN c_present_mark ON student.Student_Id = c_present_mark.Student_Id WHERE c_present_mark.time_submit IS NULL AND student.semester_session = '$session'");

$totalcpresentmarkdone = mysqli_num_rows($cpresentmarkdone);
$totalcpresentmark = mysqli_num_rows($cpresentmark);

$svmarkdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN c_mark ON student.Student_Id = c_mark.Student_Id WHERE c_mark.time_submit IS NOT NULL AND student.semester_session = '$session'");
$svmark = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN c_mark ON student.Student_Id = c_mark.Student_Id WHERE c_mark.time_submit IS NULL AND student.semester_session = '$session'");

$totalsvmarkdone = mysqli_num_rows($svmarkdone);
$totalsvmark = mysqli_num_rows($svmark);


$feedbackdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN feedback ON student.Student_Id = feedback.Student_Id WHERE feedback.time_submit IS NOT NULL AND student.semester_session = '$session'");
$feedback = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN feedback ON student.Student_Id = feedback.Student_Id WHERE feedback.time_submit IS NULL AND student.semester_session = '$session'");

$totalfeedbackdone = mysqli_num_rows($feedbackdone);
$totalfeedback = mysqli_num_rows($feedback);

$predone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN pre_evaluation ON student.Student_Id = pre_evaluation .Student_Id WHERE pre_evaluation.time_submit IS NOT NULL AND student.semester_session = '$session'");
$pre = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN pre_evaluation ON student.Student_Id = pre_evaluation .Student_Id WHERE pre_evaluation.time_submit IS NULL AND student.semester_session = '$session'");

$totalpredone = mysqli_num_rows($predone);
$totalpre = mysqli_num_rows($pre);

$firstvisitdone = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN pdf ON student.Student_Id = pdf .Student_Id WHERE pdf.path IS NOT NULL AND student.semester_session = '$session'");
$firstvisit = $db -> query("SELECT student.Student_Id FROM student LEFT JOIN pdf ON student.Student_Id = pdf .Student_Id WHERE pdf.path IS  NULL AND student.semester_session = '$session'");

$totalfirstvisitdone = mysqli_num_rows($firstvisitdone);
$totalfirstvisit = mysqli_num_rows($firstvisit);






$intern = $db -> query("Select stud_attachment.Intern_Status,student.semester_session From stud_attachment INNER JOIN student ON stud_attachment.Student_Id = student.Student_Id WHERE Intern_Status = 'Internship'  AND student.semester_session = '$session'");
$drop = $db -> query("Select stud_attachment.Intern_Status,student.semester_session From stud_attachment INNER JOIN student ON stud_attachment.Student_Id = student.Student_Id WHERE Intern_Status = 'Drop'  AND student.semester_session = '$session'");

$totalIntern = mysqli_num_rows($intern);
$totalDrop = mysqli_num_rows($drop);



$attach = $db -> query("SELECT supervisor.Supervisor_Id ,student.semester_session FROM sv_assignment INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id INNER JOIN company ON company.Group_Id = sv_assignment.Group_Id INNER JOIN stud_attachment ON company.Company_Id = stud_attachment.Company_Id INNER JOIN student ON student.Student_Id = stud_attachment.Student_Id WHERE sv_assignment.Group_Id IS NOT NULL AND student.semester_session = '$session'");
$notattch = $db -> query("SELECT Supervisor_Id FROM supervisor WHERE Supervisor_Id NOT IN(SELECT supervisor.Supervisor_Id FROM sv_assignment INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id INNER JOIN company ON company.Group_Id = sv_assignment.Group_Id INNER JOIN stud_attachment ON company.Company_Id = stud_attachment.Company_Id INNER JOIN student ON student.Student_Id = stud_attachment.Student_Id WHERE sv_assignment.Group_Id IS NOT NULL AND student.semester_session = '$session')");

$totalattach = mysqli_num_rows($attach);
$totalnotattch = mysqli_num_rows($notattch);



$active = $db -> query("SELECT* FROM supervisor  WHERE Supervisor_Status='Active'");
$nonactive = $db -> query("SELECT* FROM supervisor WHERE Supervisor_Status='Non Active'");

$totalActive = mysqli_num_rows($active);
$totalNonActive = mysqli_num_rows($nonactive);



$bitd = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITD' && student.semester_session = '$session'");
$bits = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITS' && student.semester_session = '$session' ");
$bitm = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITM' && student.semester_session = '$session'");
$biti = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITI' && student.semester_session = '$session' ");
$bite = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITE' && student.semester_session = '$session' ");
$bitc = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITC' && student.semester_session = '$session'");
$bitz = $db -> query("SELECT student.Student_Course FROM `stud_attachment` INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' && student.Student_Course = 'BITZ' && student.semester_session = '$session' ");
$totalbitd = mysqli_num_rows($bitd);
$totalbits = mysqli_num_rows($bits);
$totalbitm = mysqli_num_rows($bitm);
$totalbiti = mysqli_num_rows($biti);
$totalbite = mysqli_num_rows($bite);
$totalbitc = mysqli_num_rows($bitc);
$totalbitz = mysqli_num_rows($bitz);




$johor = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'JOHOR' AND student.semester_session = '$session'");
$melaka = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'MELAKA' AND student.semester_session = '$session'");
$ns = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'N.SEMBILAN' AND student.semester_session = '$session'");
$kl = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'KUALA LUMPUR' AND student.semester_session = '$session'");
$sel = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'SELANGOR' AND student.semester_session = '$session'");
$per = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'PERAK' AND student.semester_session = '$session'");
$pp = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'PULAU PINANG' AND student.semester_session = '$session' ");
$kedah = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'KEDAH' AND student.semester_session = '$session'");
$perlis = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'PERLIS' AND student.semester_session = '$session'");
$sabah = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'SABAH' AND student.semester_session = '$session'");
$sarawak = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'SARAWAK' AND student.semester_session = '$session'");
$pahang = $db -> query("SELECT company.Company_State FROM `stud_attachment` INNER JOIN `company` ON stud_attachment.Company_Id = company.Company_Id WHERE stud_attachment.Intern_Status = 'Internship' && company.Company_State = 'PAHANG' ");
$kelantan = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'KELANTAN' AND student.semester_session = '$session'");
$terengganu = $db -> query("SELECT company.Company_State FROM stud_attachment INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN student ON stud_attachment.Student_Id=student.Student_Id WHERE stud_attachment.Intern_Status = 'Internship' AND company.Company_State = 'TERENGGANU' AND student.semester_session = '$session'");
$totalM = mysqli_num_rows($johor);
$totalJ = mysqli_num_rows($melaka);
$totalNS = mysqli_num_rows($ns);
$totalKL = mysqli_num_rows($kl);
$totalSEL = mysqli_num_rows($sel);
$totalPER = mysqli_num_rows($per);
$totalPP = mysqli_num_rows($pp);
$totalKED = mysqli_num_rows($kedah);
$totalPERL = mysqli_num_rows($perlis);
$totalSAB = mysqli_num_rows($sabah);
$totalSAR = mysqli_num_rows($sarawak);
$totalPAH = mysqli_num_rows($pahang);
$totalKEL = mysqli_num_rows($kelantan);
$totalTER = mysqli_num_rows($terengganu);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Dashboard</title>
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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

   <div class="wrapper">
    <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
          
          
            

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["State", "No. Of Student", { role: "style" } ],
        ["JOHOR",  <?php echo $totalJ; ?>,"#33FFE6"],
        ["MELAKA", <?php echo $totalM; ?>, "#33FFE6"],
        ["N.SEMBILAN", <?php echo $totalNS; ?>, "#33FFE6"],
        ["KUALA LUMPUR", <?php echo $totalKL; ?>, "#33FFE6"],
		["SELANGOR", <?php echo $totalSEL; ?>, "#33FFE6"],
        ["PERAK", <?php echo $totalPER; ?>, "#33FFE6"],
		["PULAU PINANG", <?php echo $totalPP; ?>, "#33FFE6"],
		["KEDAH", <?php echo $totalKED; ?>, "#33FFE6"],
        ["PERLIS",  <?php echo $totalPERL; ?>,"#33FFE6"],
        ["SABAH", <?php echo $totalSAB; ?>, "#33FFE6"],
        ["SARAWAK", <?php echo $totalSAR; ?>, "#33FFE6"],
        ["PAHANG", <?php echo $totalPAH; ?>, "#33FFE6"],
		["KELANTAN", <?php echo $totalKEL; ?>, "#33FFE6"],
        ["TERENGGANU", <?php echo $totalTER; ?>, "#33FFE6"],
		
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Student Internship Company By State",
        width: 900,
        height:300,
		backgroundColor: 'transparent',
        bar: {groupWidth: "95%"},
        legend: { position: "center" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);
	}
  </script> 
  
  
   <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Course", "No. Of Student", { role: "style" } ],
        ["BITD",  <?php echo $totalbitd; ?>,"gold"],
        ["BITS", <?php echo $totalbits; ?>, "gold"],
        ["BITI", <?php echo $totalbiti; ?>, "gold"],
        ["BITM", <?php echo $totalbitm; ?>, "gold"],
		["BITZ", <?php echo $totalbitz; ?>, "gold"],
        ["BITE", <?php echo $totalbite; ?>, "gold"],
		["BITC", <?php echo $totalbitc; ?>, "gold"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Number Of Student Intership From Course",
        width: 900,
        height: 300,
		backgroundColor: 'transparent',
        bar: {groupWidth: "95%"},
        legend: { position: "center" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
	}
  </script>
  
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Supervisor', 'Percentage'],
          ['Attach',     <?php echo $totalNOTNULL; ?>],
          ['Non Attach',   <?php echo $totalNULL; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#ffa500','#b0e0e6'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart0'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  for (var i = 0; i < selection.length; i++) 
		  { 
		  var item = selection[i];
          if (item.row == 0)
			{
			  window.location.href = '../Mapping/Supervisor_Attachment.php';
			}
			 if (item.row == 1)
			{
			  window.location.href = '../Mapping/Supervisor_Attachment.php';
			}
			  
		  }
        }
      }
    </script>  
  
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Supervisor', 'Percentage'],
          ['Attach',     <?php echo $totalattach; ?>],
          ['Non Attach',   <?php echo $totalnotattch; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#ffa500','#b0e0e6'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  for (var i = 0; i < selection.length; i++) 
		  { 
		  var item = selection[i];
          if (item.row == 0)
			{
			  window.location.href = '../Mapping/Supervisor_Attachment.php';
			}
			 if (item.row == 1)
			{
			  window.location.href = 'ViewSvAttach.php';
			}
			  
		  }
        }
      }
    </script>  
         
   

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Percentage'],
          ['Active',     <?php echo $totalActive; ?>],
          ['Non Active',   <?php echo $totalNonActive; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#66cdaa','#00ff7f'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'ViewSVStatus.php?Supervisor_Status=' + pieSliceLabel;
		  }
        }
      }
    </script>  
    
  
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Percentage'],
          ['Internship',     <?php echo $totalIntern; ?>],
          ['Drop',   <?php echo $totalDrop; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#191970','#ff6666'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'ViewStStatus.php?Intern_Status=' + pieSliceLabel;
		  }
        }
      }
    </script>  
    
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalcompanymarkdone; ?>],
          ['Not Done',   <?php echo $totalcompanymark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#ea125e','#747474'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		 function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'c_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalreportmarkdone; ?>],
          ['Not Done',   <?php echo $totalreportmark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#00b0ff','#137ed9'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		  function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'report_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
          <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalsvpresentmarkdone; ?>],
          ['Not Done',   <?php echo $totalsvpresentmark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#f4d895','#f93c3c'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		 function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'present_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
       </script>  
    
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalcpresentmarkdone; ?>],
          ['Not Done',   <?php echo $totalcpresentmark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#fab297','#afd7b4'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		 function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'c_present_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totallogbookmarkdone; ?>],
          ['Not Done',   <?php echo $totallogbookmark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#faebd7','#ec3093'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
	 	function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'logbook_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
          <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalsvmarkdone; ?>],
          ['Not Done',   <?php echo $totalsvmark; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#00490c','#009a7f'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
	     function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'sv_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
   
    </script>  
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalfeedbackdone; ?>],
          ['Not Done',   <?php echo $totalfeedback; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#ff9be7','#62ff84'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart9'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'feedback_view.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalpredone; ?>],
          ['Not Done',   <?php echo $totalpre; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#8accb3','#ff5079'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart10'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		  function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'pre_mark.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>    
    
          <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Percentage'],
          ['Done',     <?php echo $totalfirstvisitdone; ?>],
          ['Not Done',   <?php echo $totalfirstvisit; ?>]
        ]);

        var options = {
          
		  backgroundColor: 'transparent',
		  colors:['#00490c','#009a7f'],
		  pieSliceText: 'value-and-percentage',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart11'));

        chart.draw(data, options);
		google.visualization.events.addListener(chart, 'select', selectHandler);
		function selectHandler() 
		{
		  var selection = chart.getSelection();
		  if (selection.length) 
		  {
			  
			  var pieSliceLabel = data.getValue(selection[0].row, 0);
			  window.location.href = 'end_letter.php?Status=' + pieSliceLabel;
		  }
        }
      }
    </script>   
      
    

                
      
          <div class="content">
                <div class="container-fluid">
                   <div class="row"> <!--row-->
                   
                   
                   <div class="col-md-3"><!--G3-->
                        <div class="card ">
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Supervisor Assignment</h4>
                                <p class="category">Student with supervisor on Student with no supervisor</p>
                               
                          </div>
    							  <div id="piechart0" style="width: 300px; height: 300px;"></div>
                         </div>
                         </div>
                         
                         
                   
                    <div class="col-md-3"><!--G3-->
                        <div class="card ">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Lecturer  <br> Status</h4>
                                <p class="category">Current Lecturer Status Active or Non Active</p>
                               
                          </div>
    							  <div id="piechart" style="width: 300px; height: 300px;"></div>
                         </div>
                         </div>
                         
                          <div class="col-md-3"><!--G3-->
                        <div class="card ">
                            <div class="card-header" data-background-color="green">
                                <h4 class="title">Student Internship Status</h4>
                                <p class="category">Current Student Status Internship or Drop</p>
                               
                          </div>
    							  <div id="piechart1" style="width: 300px; height: 300px;"></div>
                         </div>
                         </div>
                         
                          <div class="col-md-3"><!--G3-->
                        <div class="card ">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Supervisor <br> Placement</h4>
                                <p class="category">Current Supervisor <br> Placement</p>
                               
                          </div>
    							  <div id="piechart2" style="width: 300px; height: 300px;"></div>
                         </div>
                         
                         </div><!--G3-->
                         </div>
                         
                 <div class="row"> <!--row-->
                 
                           
                                <h3 class="title" style="border-style:double"><strong><center>
                                Faculty Supervisor Assesment</center></strong></h3>
                          
                
                    			<div class="col-md-3"><!--G3-->
                        		<div class="card ">
                            	<div class="card-header"  style="background-color:#009a7f">
                                <h6 class="title">Internship</h6>
                              	</div>
    							<div id="piechart6" style="width:300px; height: 300px;"></div>
                                </div>
                                </div>
                         
                                <div class="col-md-3"><!--G3-->
                        		<div class="card ">
                          		<div class="card-header" style="background-color:#ec3093">
                                <h6 class="title">Logbook</h6>
                           		</div>
    							<div id="piechart7" style="width:300px; height: 300px;"></div>
                                </div>
                                </div>
                         
                                 <div class="col-md-3"><!--G3-->
                        		 <div class="card ">
                            	 <div class="card-header" style="background-color:#137ed9">
                                 <h6 class="title">Report</h6>
                          		 </div>
    							 <div id="piechart4" style="width:300px; height: 300px;"></div>
                                 </div>
                                 </div>
                         
                          		<div class="col-md-3"><!--G3-->
                       		    <div class="card ">
                            	<div class="card-header" style="background-color:#f93c3c">
                                <h6 class="title">Presentation</h6>
                             	</div>
    							<div id="piechart5" style="width:300px; height: 300px;"></div>
                         		</div>
                         
                        	
                         </div>
                         </div>
                   
                 		 <div class="row"> <!--row-->
                   		  <h3 class="title" style="border-style:double"><strong><center>
                                Industry Supervisor Assesment</center></strong></h3>
                   
                           <div class="col-md-4"><!--G3-->                        	
                           <div class="card ">
                           <div class="card-header"style="background-color:#747474">
                            <h6 class="title">Internship</h6>
                            </div>
    						<div id="piechart3" style="width: 300px; height: 300px;"></div>
                            </div>
                            </div>
                         
                         
                         <div class="col-md-4"><!--G3-->
                        		<div class="card ">
                            	<div class="card-header" style="background-color:#afd7b4">
                                <h6 class="title">Presentation</h6>
                               	</div>
    							<div id="piechart8" style="width: 300px; height: 300px;"></div>
                         		</div>
                         </div><!--G3-->
                         </div>
                         
                  <div class="row"> <!--row-->
                 
                           
                                <h3 class="title" style="border-style:double"><strong><center>
                                Student Assesment</center></strong></h3>
                          
                
                    			<div class="col-md-4"><!--G3-->
                        		<div class="card ">
                            	<div class="card-header"  style="background-color:#62ff84">
                                <h6 class="title">Feedback</h6>
                              	</div>
    							<div id="piechart9" style="width:300px; height: 300px;"></div>
                                </div>
                                </div>
                         
                                <div class="col-md-4"><!--G3-->
                        		<div class="card ">
                          		<div class="card-header" style="background-color:#ff5079">
                                <h6 class="title">First Visit Report</h6>
                           		</div>
    							<div id="piechart10" style="width:300px; height: 300px;"></div>
                                </div>
                                </div>
                         
                                 <div class="col-md-4"><!--G3-->
                        		 <div class="card ">
                            	 <div class="card-header" style="background-color:#009a7f">
                                 <h6 class="title">End Internship Letter</h6>
                          		 </div>
    							 <div id="piechart11" style="width:300px; height: 300px;"></div>
                                 </div>
                                 </div>
                         
                          		
                        	
                         </div>
                         </div>
                         
                         
                        <div class="row"> <!--row-->
                        <div class="col-md-12"><!--G1-->
                        <h3 class="title" style="border-style:double"><strong><center>
                                Student Training Statistics</center></strong></h3>
                          
                         
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Company State</h4>
                                    <p class="category">Company Internship By Student</p>
                                </div>
                                <div class="card-content table-responsive">
                                  <div id="columnchart_values1" style="width: 500px; height: 300px;"></div> 
                              </div>
                        </div>
                        </div> <!--G1-->
                        </div>
                        
                        
                   <div class="row"> <!--row-->
                   <div class="col-md-12"> <!--G2-->
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                <h4 class="title"> Number Of Student Intership By Course</h4>
                                <p class="category"> Current Student Internship</p>
                                </div>
                                  <div id="columnchart_values" style="width: 500px; height: 300px;"></div> 
                     </div>
                   </div>  <!--G2-->
                   </div> <!--row-->
                 
                 
                     
                   
                      
                       <?php include "../Footer.php"; ?>         
                    </div> <!--container fluid -->
                    
                </div> <!--content-->
                
               
  
        </div> <!--main panel-->
    </div> <!--wrapper-->
    
</body>

<?php include "../Footer2.php"; ?>

</html>