<?php
// if(!$_POST || !$_POST['table']){
// 	exit();///
// }
$time_start = microtime(true);
include('configBlazor.php');
$res = array();
$res['data'] = array();
$res['empty'] = true;
$res['session_id'] = session_id();
$db = new mysqli($CONFIG['host'], $CONFIG['user'], $CONFIG['pass'], $CONFIG['db']);
$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
// $table = $_POST['table'];
$table = "income";
$useJsonFile =0;

$result = $db->query("select * form district") or die($mysqli->error);
echo $result;

?>