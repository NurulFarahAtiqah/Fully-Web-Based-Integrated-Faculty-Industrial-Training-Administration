<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
require_once('../Connections/Check.php');
 
if(isset($_POST['Submit'])) { 

  
	$replace = 0;
	$new = 0;
	$unabletoinsert = 0;  
	 
    $name = strtoupper($_POST['Company_Name']);
    $add = strtoupper($_POST['Company_Add']);
    $add2 = strtoupper($_POST['Company_Add2']);
	$city = strtoupper($_POST['Company_City']);
	$posscode = $_POST['Company_Posscode'];
    $state = $_POST['Company_State'];
	$phone = $_POST['Company_Phone'];
	$fax = $_POST['Company_Fax'];
	 
	 
        $fullcompanyinfo = $name.$add.$add2.$city.$posscode.$state;
		$fullcompanyinfo = str_replace(' ', '+', $fullcompanyinfo);
		$companystate = str_replace(',', '',$state);
		
		$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

		$f = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address='.$fullcompanyinfo.'&key=AIzaSyCd319KPTRzC3mSZezb3T2gwwQTnq2vIRM", false, stream_context_create($arrContextOptions));
		$output= json_decode($f);

		if(!empty($output->results[0]->geometry->location->lat))
		{
			$lat = $output->results[0]->geometry->location->lat;
			$lng = $output->results[0]->geometry->location->lng;
			$checksame = $db->query("SELECT Company_Latitude,Company_Longtitude FROM company WHERE Company_Latitude='$lat' AND Company_Longtitude='$lng'");
			$row = mysqli_num_rows($checksame);

			if($row >= 1)
			{
				$sql = $db->query('UPDATE company SET Company_Name="'.$name.'",Company_Add="'.$add.'",Company_Add2="'.$add2.'",Company_City="'.$city.'",Company_Posscode="'.$posscode.'",Company_State="'.$state.'",Company_Phone="'.$phone.'",Company_Fax="'.$fax.'",Company_Latitude="'.$lat.'",Company_Longtitude="'.$lng.'" WHERE Company_Latitude="'.$lat.'" ');
				//if($sql)
				$replace += 1;
			}
			else
			{
				$sql = $db->query('INSERT INTO company(Company_Name,Company_Add,Company_Add2,Company_City,Company_Posscode,Company_State,Company_Phone,Company_Fax,Company_Latitude,Company_Longtitude,Password,Confirm_Password) VALUES ("'.$name.'","'.$add.'","'.$add2.'","'.$city.'","'.$posscode.'","'.$state.'","'.$phone.'","'.$fax.'","'.$lat.'","'.$lng.'",123456,123456)');
				//if($sql)
				$new += 1;
			}
		}
			else{
			
			$sql = $db->query('INSERT INTO company(Company_Name,Company_Add,Company_Add2,Company_City,Company_Posscode,Company_State,Company_Phone,Company_Fax,Company_Latitude,Company_Longtitude,Password,Confirm_Password) VALUES ("'.$name.'","'.$add.'","'.$add2.'","'.$city.'","'.$posscode.'","'.$state.'","'.$phone.'","'.$fax.'",0,0,123456,123456)');
			
			$unabletoinsert +=1;
		

		}
	
		echo "<script type='text/javascript'>alert('$new New Data Inserted. \\n$replace Old Data Updated. \\n$unabletoinsert Company Failed to Find Latitude and Longtitude.Please Update The Company Latitude and Longtitude Manually');</script>";
		include('View_CompanyALL.php');
		
}

?>
</body>
</html>
