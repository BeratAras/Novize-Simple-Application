<?php 

if(!get("id")){
	header("location:index.php");exit();
}

$id=(int)get("id");

$db->sql = "select * from admin_users where admin_id";
$db->veri = array( $id );

$yorum = $db->select(1);

if ($yorum == false) {
	header("location:index.php");exit();
}

$db->sql = "delete from admin_users where admin_id=?";
$db->veri = array( $id );
$sil = $db->delete();

if ($sil == true) {
	header("location:index.php?url=adminler&islem=silindi");
}else{
	header("location:index.php?url=adminler&islem=silinemedi");
}


?>