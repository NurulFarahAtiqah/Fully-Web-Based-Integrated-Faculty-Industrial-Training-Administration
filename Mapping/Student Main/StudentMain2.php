<?php
include("StudentCheck.php"); 

if(isset($_GET['ID']))
{
$query ='DELETE FROM notification WHERE ID = "'.$_GET['ID'].'"';
$result1 = mysqli_query($db,$query);
}
$result2 = mysqli_query($db, 'SELECT student.Student_Matric, supervisor.Supervisor_Name FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON company.Company_Id = stud_attachment.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id WHERE student.Student_Matric="'.$login_user.'"');
 
while($res = mysqli_fetch_array($result2))
{
   
	$svname = $res['Supervisor_Name'];
}
if(mysqli_num_rows($result2)==0)
 {
	$matric = $res['Student_Matric'];
	echo "<script>
alert('You are not assigned to any supervisor. Cannot answer feedback form.');
window.location.href='StudentMain.php';
</script>";
	 
 }	
 
 
$result = mysqli_query($db, 'SELECT student.Student_Matric,student.Student_Name,supervisor.Supervisor_Name FROM feedback INNER JOIN student ON student.Student_Id = feedback.Student_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = feedback.Supervisor_Id WHERE student.Student_Name = "'.$login_name.'"' );

$res = mysqli_fetch_array($result);

if(mysqli_num_rows($result)==1)
{
	$matric = $res['Student_Matric'];
	echo "<script>
alert('You are already submit feedback form.');
window.location.href='ViewFeedback.php?Student_Matric=$matric';
</script>";
}




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>Feedback Form</title>
    <link href="../css/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../css/style3.css" rel="stylesheet"/>
             <style>
		body {
    width: 100%;
    height: 100%;
}
body{
    
    background:url(../icon/ftmk.jpg);
	background-size: cover;
	background-attachment:fixed;
	background-repeat:no-repeat;
    color: #fff;
}

.brand-logo{
    width: 120px;
}
.hero{
  
    background-image:url(../icon/ftmk.jpg);
    background-size: cover;
    background-position: center center;
	background-attachment:fixed;
	background-repeat:no-repeat;
    min-height: 100%;
    min-width: 100%;
    width: auto;
    height: auto;
    margin: 0;
    position: absolute;
}
.hero:after{
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    content: "";
    background-color: rgba(0, 0, 0, 0.8);
}
.hero .container{
    z-index: 9;
    position: relative;
}
.hero .card{
    background: rgba(0,0,0,0.7);
}
a, a:hover{
    color: #fff;
    text-decoration: underline;
}
@media (min-width:576px){
    section{
        padding: 25px 0px;
    }
    .hero .card .card-block{
        padding-left: 4rem;
        padding-right: 4rem;
    }
}
@media (max-width:576px){
    section{
        padding: 20px;
    }
}
.bg-alt {
    background-color: #fff;
}
.btn{
    -webkit-transition: 350ms ease all;
    transition: 350ms ease all;
    text-transform: uppercase;
    font-weight: 500;
    padding: .6rem 1.5rem;
    cursor: pointer;
}
.btn:hover, .btn:focus {
    box-shadow: 6px 6px 25px rgba(0, 0, 0, 0.15);
}
.btn-primary{
    background-color: #ff5722 !important;
    border-color: #ff5722 !important;
}
.btn-primary:hover, .btn-primary:focus{
    color: #fff !important;
}
.form-group {
    margin-bottom: 1.5rem;
}
.form-control{
    height: 45px;
    font-size: 16px;
    background-color: rgba(255, 255, 255, 0.5);
    border-color: rgba(255, 255, 255, 0.5);
   color:#000;  
}
.form-control:focus {
    background-color: rgba(255, 255, 255, 0.5);
    border-color: rgba(255, 255, 255, 0.5);
   color:#000; 
}
.border-none{
    border: none !important;
    border-color: transparent !important;
}
.text-primary{
    color: #ff5722 !important;
}
.custom-control-input:checked~.custom-control-indicator {
    color: #fff;
    background-color: #ff5722;
    outline-color: #ff5722; 
}
.content-divider.center {
    text-align: center;
}
.content-divider {
    position: relative;
    z-index: 1;
}
.content-divider > span, .content-divider > a {
    background-color: #000;
    color: #fff;
    display: inline-block;
    padding: 2px 12px;
    border-radius: 3px;
    text-transform: uppercase;
    font-weight: 500;
}
.content-divider > span:before, .content-divider > a:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    height: 1px;
    background-color: #ddd;
    width: 100%;
    z-index: -1;
}
		
		.btn1 {    -webkit-transition: 350ms ease all;
    transition: 350ms ease all;
    text-transform: uppercase;
    font-weight: 500;
    padding: .6rem 1.5rem;
    cursor: pointer;
}
.form-control1 {    height: 45px;
    font-size: 16px;
    background-color: rgba(255, 255, 255, 0.5);
    border-color: rgba(255, 255, 255, 0.5);
    color: #000; 
}
.form-group1 {    margin-bottom: 1.5rem;
}
        </style>
</head>
<body>
      <section class="hero">
    <div class="container">
  
        <form action="save.php" method="post">
            <div class="wizards">
                <div class="progressbar">
                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
                </div> 
                <div class="form-wizard active">
                    <div class="wizard-icon"></div>
                    <p>Student Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"></div>
                    <p>Part A</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"></div>
                    <p>Part B</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"></div>
                    <p>Part C</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"></div>
                    <p>Submit</p>
                </div>
            </div>
             <fieldset>
                <h4>Student Details</h4>
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" id="cname" name="cname" value="<?php echo $login_name ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Supervisor Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $svname ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Student Course</label>
                    <input type="text" id="Student_Course" name="Student_Course" value="<?php echo $login_course ?>" class="form-control"/>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <h4>Feedback Part A : Organization Assessment</h4>
                <div class="form-group">
                    <h6>1. Cooperation</h6>
                    <select class="form-control" id="QA1" name="QA1">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <h6>2. Guidance</h6>
                     <select class="form-control" id="QA2" name="QA2">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                <h6>3. Internship Scope:</h6>
                    <label>I) Compatibility with specialization course.</label>
                   <select class="form-control" id="QA3" name="QA3">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>II) Compliance with the field of ICT in general.</label>
                  <select class="form-control" id="QA4" name="QA4">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <h6>4. Work load.</h6>
                  <select class="form-control" id="QA5" name="QA5">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                     <div class="form-group">
                <h6>5. Facilities provided:</h6>
                    <label>I) Computer.</label>
                   <select class="form-control" id="QA6" name="QA6">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>II) Room.</label>
                  <select class="form-control" id="QA7" name="QA7">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>III) Allowance.</label>
                  <select class="form-control" id="QA8" name="QA8">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <h4>Feedback Part B : Organization Info</h4>
                <div class="form-group">
                	<h6>1. Your internship training venue is suitable for:</h6>
                    <select class="form-control" id="QB1" name="QB1">
                        <option>Computer Network</option>
                        <option>Software Engineering</option>
                        <option>Interactive Media</option>
                    </select>
                </div>
                <div class="form-group">
                    <h6>2. The programming language used at the internship training site:</h6>
                    <select class="form-control" id="QB2" name="QB2">
                        <option>C</option>
                        <option>C++ Visual</option>
                        <option>Visual Basic</option>
                        <option>JAVA</option>
                        <option>Others</option>
                    </select>
                </div>
                  <div class="form-group">
                    <h6>3. The Operating System used at the internship training site:</h6>
                     <input type="text" id="QB3" name="QB3" class="form-control" required/>
                </div>
                  <div class="form-group">
                    <h6>4. The Computer Type used at the internship training site:</h6>
                     <select class="form-control" id="QB4" name="QB4">
                        <option>PC</option>
                        <option>Work Station</option>
                        <option>Mini Framework</option>
                        <option>Main Framework</option>
                        <option>Others</option>
                    </select>
                </div>
               
                 <div class="form-group">
                    <h6>5. The Database used at the internship training site:</h6>
                    <select class="form-control" id="QB5" name="QB5">
                        <option>ORACLE</option>
                        <option>MYSQL</option>
                        <option>Microsoft Access</option>
                        <option>Others</option>
                    </select>  
                </div>
                  <div class="form-group">
                    <h6>6. The Software used at the internship training site:</h6>
                     <input type="text" id="QB6" name="QB6" class="form-control" required/>
                </div>
                <div class="form-group">
                    <h6>7. The Information System used at the internship training site:</h6>
                     <input type="text" id="QB7" name="QB7" class="form-control" required/>
                </div>
                <div class="form-group">
                    <h6>8. Software Development Techniques used:</h6>
                     <select class="form-control" id="QB8" name="QB8">
                        <option>Object Oriented</option>
                        <option>Structured</option>
                        <option>CASE Tools</option>
                        <option>Prototyping</option>
                        <option>Multimedia Development Process</option>
                    </select>
                </div>
                <div class="form-group">
                        <h6>9. The Activity done at the internship training site:</h6>
                        <input type="text" id="QB9" name="QB9" class="form-control"/>
                    </div>
                      <div class="form-group">
                    <h6>10. Got an offer to work in an industry training?</h6>
                        <select class="form-control" id="QB10" name="QB10">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                    <h4>Feedback Part C : Assessment of the Curriculum Courses</h4>
                     <div class="form-group">
                <h6>1. Please inform whether the knowledge and skills learned in UTeM are sufficient and appropriate to the tasks being given and requested by the industry:</h6>
                    <label>a) Sufficient.</label>
                   <select class="form-control" id="QC1" name="QC1">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>b) Suitable.</label>
                  <select class="form-control" id="QC2" name="QC2">
                        <option>Not Satisfactory</option>
                        <option>Less Satisfactory</option>
                        <option>Satisfactory</option>
                        <option>Good</option>
                        <option>Excellent</option>
                    </select>
                </div>
                    <div class="form-group">
                        <label>Please provide comments and suggestions based on statements 1 (a) and 1 (b).</label>
                        <textarea name="QC3" id="QC3" class="form-control"></textarea>
                    </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <div class="jumbotron text-center">
                <h1>Please click submit button to save your feedback</h1>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" name="Submit" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </fieldset>
        </form>
        
    </div>

    </section>
    
    <script src="../js/js/jquery.min.js"></script>
    <script src="../js/js/popper.min.js"></script>
    <script src="../js/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>