<?php
// if(!$_POST || !$_POST['table']){
// 	exit();///
// }
$time_start = microtime(true);
include('config.php');
$res = array();
$res['data'] = array();
$res['empty'] = true;
$res['session_id'] = session_id();
$db = new mysqli($CONFIG['host'], $CONFIG['user'], $CONFIG['pass'], $CONFIG['db']);
$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
// $table = $_POST['table'];
$table = "survey_profile";
$useJsonFile =0;
$text = $_POST['type'];

if ($_POST['id']) {
	$id = $_POST['id'];
	//echo "SELECT income,income_edit.HC,`survey_profile`.*  FROM income_edit,survey_profile WHERE(income_edit.HC= '$id' and income_edit.HC=survey_profile.HC   )";
	$result = $db->query("
	SELECT income,income_edit.HC,`survey_profile`.*  ,tambon.tambon_name_thai ,district.district_name_thai,province.province_name_thai
	
	FROM income_edit,survey_profile,tambon ,district ,province
	
	
	WHERE(income_edit.HC= '$id' and 
	income_edit.HC=survey_profile.HC and 
	tambon.tambon_id=income_edit.TMP  COLLATE 'utf8_general_ci' and
	district.district_id=tambon.district_id and
	province.province_id=tambon.province_id 
	
	
	) limit 1000
	
	") or die($mysqli->error);
	$res['where'] = $where;
	$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($resultArray, $result1);
	}
} else if ($_GET['id']) {

	$id = $_GET['id'];
	/* echo "SELECT income,income_edit.HC,`survey_profile`.*  ,tambon.tambon_name_thai ,district.district_name_thai,province.province_name_thai
	
	FROM income_edit,survey_profile,tambon ,district 
	
	
	WHERE(income_edit.HC= '$id' and 
	income_edit.HC=survey_profile.HC and 
	tambon.tambon_id=income_edit.TMP  COLLATE 'utf8_general_ci' and
	district.district_id=tambon.district_id and
	province.province_id=tambon.province_id 
	
	
	)";
	 */
	$result = $db->query("
	SELECT income,income_edit.HC,`survey_profile`.*  ,tambon.tambon_name_thai ,district.district_name_thai,province.province_name_thai
	
	FROM income_edit,survey_profile,tambon ,district ,province
	
	
	WHERE(income_edit.HC= '$id' and 
	income_edit.HC=survey_profile.HC and 
	tambon.tambon_id=income_edit.TMP  COLLATE 'utf8_general_ci' and
	district.district_id=tambon.district_id and
	province.province_id=tambon.province_id 
	
	
	)
	") or die($mysqli->error);
	$res['where'] = $where;
	$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($resultArray, $result1);
	}
} elseif (	$_POST['type'] == "รายได้ by jsonFile") {

	/* $result = $db->query("SELECT * FROM `$table`
	INNER JOIN survey_profile ON `$table`.HC=survey_profile.HC;
	LIMIT 100
	
	
	"); */
	// $result = $db->query("SELECT income,income_edit.HC,`survey_profile`.id,
	// `survey_profile`.lat,`survey_profile`.lng,'รายได้' as type 
	// FROM income_edit,survey_profile
	// WHERE(income_edit.HC=survey_profile.HC)");
	$result = $db->query("SELECT `survey_profile`.HC,
	`survey_profile`.lat,`survey_profile`.lng,'รายได้' as type 
	FROM survey_profile
	");
	// print_r($result);
	$res['where'] = $where;
	$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($resultArray, $result1);
	}



	/* if($_POST['where']){
		
		$where = $_POST['where'];
		//$result = $db->query("SELECT * FROM `$table` WHERE $where");
		$result = $db->query("SELECT * FROM `$table`");
		$res['where'] = $where;
	} else {
		$result = $db->query("SELECT * FROM `$table`");
		$res['where'] = '';
	} */
} elseif (	$_POST['type'] =="รายได้ by jsonFile") {
	/* echo "SELECT income,income_edit.HC,`survey_profile`.*  ,tambon.tambon_name_thai ,district.district_name_thai,province.province_id,province.province_name_thai
	
	FROM income_edit,survey_profile,tambon ,district ,province
	
	
	WHERE(
	income_edit.HC=survey_profile.HC and 
	tambon.tambon_id=income_edit.TMP   and
	district.district_id=tambon.district_id and
	province.province_id=tambon.province_id and
	province.province_name_thai='ปัตตานี')
	"; */
	# code...
	$result = $db->query("
	SELECT income,income_edit.HC,`survey_profile`.lat  ,survey_profile.lng,survey_profile.JUN
	FROM income_edit,survey_profile
	
	
	WHERE(
	income_edit.HC=survey_profile.HC 
	) 

	
	");
	// $res['where'] = $where;

// print_r($result);
	/* 	$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($resultArray, $result1);
	} echo '<pre>'; print_r($resultArray); echo '</pre>'; */
	//  |
	//  |
	//  |
	//  V


	/* 	[0] => Array
	(
		[income] => 2462.5
		[HC] => 1805-011438-4
		[lat] => 15.0365
		[lng] => 100.162
		[JUN] => 18
	)

[1] => Array
	(
		[income] => 1566.67
		[HC] => 1805-020019-0
		[lat] => 15.0306
		[lng] => 100.163
		[JUN] => 18
	)

[2] => Array
	(
		[income] => 1566.67
		[HC] => 1805-020019-0
		[lat] => 15.0306
		[lng] => 100.163
		[JUN] => 18
	) */


	// if($result->num_rows>0){
	// 	$res['empty'] = false;
	// 	while($row = $result->fetch_assoc()){
	// 		if($row['pwd'] || $row['pwd']==""){
	// 			unset($row['pwd']);
	// 		}
	// 		if($row['pre_pwd'] || $row['pre_pwd']==""){
	// 			unset($row['pre_pwd']);
	// 		}
	// 		if($row['pre_password'] || $row['pre_password']==""){
	// 			unset($row['pre_password']);
	// 		}
	// 		array_push($res['data'],$row);
	// 	}
	// }
	// 	Array
	// (
	// 	[income] => 2462.5
	// 	[HC] => 1805-011438-4
	// 	[lat] => 15.0365
	// 	[lng] => 100.162
	// 	[JUN] => 18
	// )
	$resultArray = array();
	$temp = array();
	if ($result->num_rows > 0) {
		

		/* while ($row = $result->fetch_assoc()) {
			array_push(	$temp, array( $row['income'], $row['HC'], $row['lat'], $row['lng'] ));
		} */
		while ($row = $result->fetch_assoc()) {
			
				$temp[]= $row['income'];
				$temp[]= $row['HC'];
				$temp[]=$row['lat'];
				$temp[]=$row['lng'];
				
			
			// array_push(	$temp, array(,, , ));
		}
		$resultArray['all'][]=$temp;
		/* echo '<pre>';
		print_r($resultArray);
		echo '</pre>'; */
	}

	/* if ($result)
        {
			$jsonToDev=array();
            foreach ($result as $key => $item) 
            {
				echo "<br> $key ";
				print_r($item['lat']);
			array
            //    '' $result[$key] = $item['lat'];
            }
        } */
	/* echo '<pre>';
	print_r($jsonToDev);
	echo '</pre>'; */
	//print_r($result);die;


}else{
	
	$result = $db->query("SELECT `survey_profile`.HC,
	`survey_profile`.lat,`survey_profile`.lng
	FROM survey_profile
	");
	
	$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo $result1['lat']."|".$result1['lng']."|". $result1['HC']."<br>";
		//array_push($resultArray, $result1);
	}



	/* if($_POST['where']){
		
		$where = $_POST['where'];
		//$result = $db->query("SELECT * FROM `$table` WHERE $where");
		$result = $db->query("SELECT * FROM `$table`");
		$res['where'] = $where;
	} else {
		$result = $db->query("SELECT * FROM `$table`");
		$res['where'] = '';
	} */
}

//$resultArray="dfdfdf";

//


/* 
$fp = fopen('/var/www/html/gis_bssm/data/results.json', 'w+');
fwrite($fp,json_encode($resultArray,true) );
fclose($fp);
 */




// if ($useJsonFile == 0 or $useJsonFile == 2) {
// 	echo json_encode($resultArray, true);
// } else {
// 	file_get_contents('/var/www/html/gis_bssm/data/results.json');

// 	echo json_encode(file_get_contents('/var/www/html/gis_bssm/data/results.json'), true);
// }





// $time_end = microtime(true);
// $time = $time_end - $time_start;

// echo "<html><script>console.log('เวลาที่ใช้ในการประมวลทั้งหมด $time วินาที')</script></html>";
echo json_encode($resultArray, true);

mysqli_close($db);
