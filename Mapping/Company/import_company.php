<?php
require_once('../Connections/Check.php');
if(isset($_POST['submit']))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$replace = 0;
	$new = 0;
	$unabletoinsert = 0;
	
	$fp = count(file($file, FILE_SKIP_EMPTY_LINES));
	$i=1;
    $HEADER = fgetcsv($handle,1000,",");
	while(($fileop = fgetcsv($handle,1000,","))!== false)
	{
		$companyname = $fileop[6];
		$companyadd = $fileop[7];
		$companyadd2 = $fileop[8];
		$companycity = $fileop[9];
		$companypostcode = $fileop[10];
		$companystate = $fileop[11];
		$companyphone = $fileop[12];
		$companyfax = $fileop[13];

		$fullcompanyinfo = html_entity_decode(htmlentities($companyname.$companyadd.$companyadd2.$companycity.$companypostcode.$companystate));
        $partialcompinfo = $companyadd.$companypostcode.$companystate;
		$fullcompanyinfo = str_replace(' ', '+', $fullcompanyinfo);
		//echo "<br />" . $fullcompanyinfo . "<br />";
		//$fullcompanyinfo = str_replace('', '', $fullcompanyinfo);
		//echo $fullcompanyinfo;
		$companystate = str_replace(',', '',$companystate);
		
		$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

	
		$f = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address='.$fullcompanyinfo.'&key=AIzaSyCd319KPTRzC3mSZezb3T2gwwQTnq2vIRM", false, stream_context_create($arrContextOptions));
		$output= json_decode($f);

		if(!empty($output->results[0]->geometry->location->lat)){
			$lat = $output->results[0]->geometry->location->lat;
			$lng = $output->results[0]->geometry->location->lng;
			$checksame = $db->query('SELECT Company_Latitude FROM company WHERE Company_Latitude="'.$lat.'"');
			$row = mysqli_num_rows($checksame);

			if($row >= 1){
				$sql = $db->query('UPDATE company SET Company_Name="'.$companyname.'",Company_Add="'.$companyadd.'",Company_Add2="'.$companyadd2.'",Company_City="'.$companycity.'",Company_Posscode="'.$companypostcode.'",Company_State="'.$companystate.'",Company_Phone="'.$companyphone.'",Company_Fax="'.$companyfax.'",Company_Latitude="'.$lat.'",Company_Longtitude="'.$lng.'" WHERE Company_Latitude="'.$lat.'"');
			    if($sql)
				$replace += 1;
			}
			else{
				$sql = $db->query('INSERT INTO company(Company_Name,Company_Add,Company_Add2,Company_City,Company_Posscode,Company_State,Company_Phone,Company_Fax,Company_Latitude,Company_Longtitude,Password,Confirm_Password) VALUES ("'.$companyname.'","'.$companyadd.'","'.$companyadd2.'","'.$companycity.'","'.$companypostcode.'","'.$companystate.'","'.$companyphone.'","'.$companyfax.'","'.$lat.'","'.$lng.'",123456,123456)');
				if($sql)
				$new += 1;
			}
		}
		
		else{
			
			$sql = $db->query('INSERT INTO company(Company_Name,Company_Add,Company_Add2,Company_City,Company_Posscode,Company_State,Company_Phone,Company_Fax,Company_Latitude,Company_Longtitude,Password,Confirm_Password) VALUES ("'.$companyname.'","'.$companyadd.'","'.$companyadd2.'","'.$companycity.'","'.$companypostcode.'","'.$companystate.'","'.$companyphone.'","'.$companyfax.'",0,0,123456,123456)');
			if($sql)
			$unabletoinsert +=1;
		}

		?>
		<style>
		div.centered {
		  position: fixed;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		}
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
		<div id="progress" class="centered" style="width:100%"></div>
		<div id="information" class="centered" style="width" align="center"></div>


		<?php
		$total = $fp;

    $percent = intval($i/$total * 100)."%";

    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.'/'.$fp.' data(s) processed.";
    </script>';

    echo str_repeat(' ',1024*64);
    flush();
    sleep(1);
		$i++;
		echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
	}
		echo "<script type='text/javascript'>alert('$new New Data Inserted. \\n$replace Old Data Replaced. \\n$unabletoinsert Company Failed to Find Latitude and Longtitude, \\nPlease Update Company Latitude and Longtitude Manually.');</script>";
		
}

echo "<script> location.href='View_CompanyALL.php'; </script>";
exit();

?>
