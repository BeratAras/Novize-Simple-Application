<?php

if(!defined("ADMİN"))
{
	die("Kullanıcı Girişi Yapın..");
}
session_destroy(); #Session Siler

$user_id = $_SESSION['user_id'];
date_default_timezone_set("Europe/Istanbul");
setlocale(LC_TIME, 'tr_TR');
$db->sql = "insert into admin_logs set user_id=?, action=?, date=?";
$db->veri = array($user_id, "logout", strftime("%d.%m.%Y Saat: %H:%M") );
$ekle = $db->insert();
header("Location: index.php?url=login");

if(headers_sent())
						{ // headers gönderilmişse javascript ile yönlendir.
							echo("<script>location.href='index.php?url=login'</script>");
						}else
						{
							header("Location: index.php?url=login");
						}

						?>