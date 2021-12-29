<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE &  ~E_WARNING);



require_once ("config.php");
$db = new mysqli($CONFIG['host'], $CONFIG['user'], $CONFIG['pass'], $CONFIG['db']);
$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

$con = mysqli_connect($CONFIG['host'], $CONFIG['user'], $CONFIG['pass'], $CONFIG['db']);
$query=mysqli_real_escape_string($con,"
SELECT
	concat( 'public class ', 'ch2_gis', '{' ) UNION
SELECT
	concat( 'public ', tps.dest, ' ', column_name, '{get;set;}' ) 
FROM
	information_schema.COLUMNS c
	JOIN (
	SELECT
		'char' AS orign,
		'string' AS dest UNION ALL
	SELECT
		'varchar',
		'string' UNION ALL
	SELECT
		'longtext',
		'string' UNION ALL
	SELECT
		'datetime',
		'DateTime' UNION ALL
	SELECT
		'text',
		'string' UNION ALL
	SELECT
		'bit',
		'int' UNION ALL
	SELECT
		'bigint',
		'int' UNION ALL
	SELECT
		'int',
		'int' UNION ALL
	SELECT
		'double',
		'double' UNION ALL
	SELECT
		'decimal',
		'double' UNION ALL
	SELECT
		'date',
		'DateTime' UNION ALL
	SELECT
		'tinyint',
		'bool' 
	) tps ON c.data_type LIKE tps.orign 
WHERE
	table_schema = 'livingon_thaipov2' 
	AND table_name ='ch2_gis' UNION
SELECT
	'}';");
	echo $query;
$result = mysqli_query ($con,$query) or some_func(mysqli_error($query));
while($r = mysqli_fetch_array($result))
{
    $print_r($r);
}
function some_func($str) {
    die("ERROR: ".$str);
}
?>