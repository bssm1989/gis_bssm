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
$table = "income";
$useJsonFile =0;

$result = $db->query("
INSERT INTO Employee (Id, Fullname, Email,MobileNumber)
VALUES (".$_GET['id'].", 'Doe', 'john@example.com','415455')
") or die($mysqli->error);
echo $result;
$resultArray = array();
	while ($result1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($resultArray, $result1);
	}
	echo "hello world";
echo $_GET['id'] ;
?>