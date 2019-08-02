<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
</head>
<?php 


ob_start();
session_start();

require_once '../system/sabitler.php';
require_once '../system/functions.php';
require_once '../system/database.php';

if( !isset($_SESSION["admin"]) ){
	require_once 'app/login.php';
	exit();
}

define("ADMİN",true);

if(!get("url"))
{
	$file = "app/dashboard.php";
}else
{
	$file = "app/". get("url") .".php";
}

if(file_exists($file))
{
	require_once $file;
}
else
{
	echo "Dosya Bulunamadı.";
	exit();
}

ob_end_flush();



?>