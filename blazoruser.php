<?php
// if(!$_POST || !$_POST['table']){
// 	exit();///
// }

 header('Access-Control-Allow-Origin: *'); 
$time_start = microtime(true);
require_once ("configBlazor.php");
require_once ("functionBlazor.php");

$id=$_GET['id'];

$mysqli=mcon($mysql["host"], $mysql["user"], $mysql["pass"], $mysql["dbname"],$mysql["charset"]);


$name1="SELECT id, username ,name ,email ,JUN FROM  volunteer WHERE id='$id'";
$result_name=$mysqli->query($name1);
$row_name=$result_name->fetch_object();




// $table = 
$row_name->id=3;

//echo "SELECT  username ,name ,email ,JUN FROM  volunteer WHERE id=".$id."<br/>"	;
if($id>0)
{
	
    echo json_encode($row_name);

    /* close result set */
    
}








////$result = $db->query( "SELECT * FROM `district` where district_id =1001" );
//echo json_encode($result,true);
mysqli_close($db);
?>