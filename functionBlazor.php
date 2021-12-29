<?php
function ocon($server,$user,$password,$dbname,$charset){
	return $conn = oci_connect($user,$password,$server."/".$dbname,$charset);
}

function mcon($host,$user,$password,$db,$charset){
	$mysqli = new mysqli($host,$user,$password,$db);  
	$mysqli->set_charset($charset);
	return $mysqli;
};

function user_login($user,$password){
	$client=new SoapClient("https://passport.psu.ac.th/authentication/authentication.asmx?WSDL");
	$login=array("username"=>$user,"password"=>$password);
	$result = $client->GetStaffDetails($login);
	$result =  (array) $result;
	$result =  (array) $result[GetStaffDetailsResult];
	$result=$result[string];
//	$result[0]=true;
	if($result[0]){
		$return=array(
			"login"=>1,
			"name"=>$result[1],
			"sname"=>$result[2]
		);
//		$return=array(
//			"login"=>1,
//			"name"=>"ภัทธ์ เอมวัฒน์"
//		);

		return $return;
	}else{
		return 0;
	}
	return $result;
}

//function sour

function cut_array_empty($array){
	$count=count($array);
	$j=0;
	for($i=0;$i<=$count;$i++){
		if($array[$i]){$array1[$j++]=$array[$i];}
	}

	return $array1;
}

function cut_array_dup($array){
	$count=count($array);
	$tmp=$array[0];
	$j=1;
	$array1[0]=$array[0];
	for($i=1;$i<$count;$i++){
		if($tmp!=$array[$i]){
			$array1[$j++]=$array[$i];
			$tmp=$array[$i];
		}
	}
	return $array1;
}

function cut_array_value($array,$value){
	$count=count($array);
	$j=0;
	for($i=0;$i<$count;$i++){
		if($array[$i]!=$value){$array1[$j++]=$array[$i];}
	}

	return $array1;
}

function time_now(){return date("H:i:s");}
function time_now2(){return date("His");}
function date_now(){return (date("Y")+543).date("m").date("d");}

function n2t($num){return $num[0].$num[1].":".$num[2].$num[3].":".$num[4].$num[5];}
function n2d($num){return $num[0].$num[1]."/".$num[2].$num[3]."/".$num[4].$num[5].$num[6].$num[7];}

function date_show($date){
	$m["01"]="มกราคม";
	$m["02"]="กุมภาพันธ์";
	$m["03"]="มีนาคม";
	$m["04"]="เมษายน";
	$m["05"]="พฤษภาคม";
	$m["06"]="มิถุนายน";
	$m["07"]="กรกฎาคม";
	$m["08"]="สิงหาคม";
	$m["09"]="กันยายน";
	$m["10"]="ตุลาตม";
	$m["11"]="พฤศจิกายน";
	$m["12"]="ธันวาคม";
	$date=explode(" ",$date);
	$date0=$date[0];
	$date1=$date0[0].$date0[1].$date0[2].$date0[3];
	$date2=$date0[4].$date0[5];
	$date3=$date0[6].$date0[7];
	return $date3."&nbsp;".$m[$date2]."&nbsp;".$date1;
}

function date_show1($date){
	if($date){
		$m["01"]="ม.ค.";
		$m["02"]="ก.พ.";
		$m["03"]="มี.ค.";
		$m["04"]="เม.ย.";
		$m["05"]="พ.ค.";
		$m["06"]="มิ.ย.";
		$m["07"]="ก.ค.";
		$m["08"]="ส.ค.";
		$m["09"]="ก.ย.";
		$m["10"]="ต.ค.";
		$m["11"]="พ.ย.";
		$m["12"]="ธ.ค.";
		$date=explode(" ",$date);
		$date0=$date[0];
		$date1=$date0[0].$date0[1].$date0[2].$date0[3];
		$date2=$date0[4].$date0[5];
		$date3=$date0[6].$date0[7];
		$time=$date0[9].$date0[11];
		return $date3." ".$m[$date2]." ".$date1;
	}else{
		echo"-";
	}
}

function timestamp2date($time){
	if($time){
		$t=date('d/m/',$time);
		$t.=date('Y',$time)+543;
		$t.=" ";
		$t.= date('H:i',$time);
	}
	return $t;
}

function standard_deviation_population ($a)
{
  //variable and initializations
  $the_standard_deviation = 0.0;
  $the_variance = 0.0;
  $the_mean = 0.0;
  $the_array_sum = array_sum($a); //sum the elements
  $number_elements = count($a); //count the number of elements

  //calculate the mean
  $the_mean = $the_array_sum / $number_elements;

  //calculate the variance
  for ($i = 0; $i < $number_elements; $i++)
  {
    //sum the array
    $the_variance = $the_variance + ($a[$i] - $the_mean) * ($a[$i] - $the_mean);
  }

  $the_variance = $the_variance / $number_elements;

  //calculate the standard deviation
  $the_standard_deviation = pow( $the_variance, 0.5);

  //return the variance
  return $the_standard_deviation;
}

function sqr($num){
	return $num*$num;
}
?>