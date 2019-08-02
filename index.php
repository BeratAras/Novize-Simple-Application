<?php 

ob_start();
//echo "<p>Site</p>index.php";
require_once 'system/sabitler.php';
require_once 'system/functions.php';
require_once 'system/database.php';
require_once 'system/MUpload.php';

if (get("url")) {
	
	$file = "app/". get("url") .".php";

}else{

	$file = 'app/anasayfa.php';

}


if (file_exists($file)) {
	require $file;
}else{
	echo 'Dosya Bulunamadı...';
	exit();
}


ob_end_flush();
?>