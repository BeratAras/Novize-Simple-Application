<?php

$url = $_SERVER['HTTP_REFERER'];  

session_start();
session_destroy(); #Session Siler
header("Location: index.php");
/*header("Location: " .$url);*/
?>