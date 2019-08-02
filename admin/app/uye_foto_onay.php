<?php 
if(!get("id")){
	header("location:index.php");exit();
}

$id=(int)get("id");

$db->sql = "select * from users where user_id";
$db->veri = array( $id );

$konu = $db->select(1);

if ($konu == false) {
	header("location:index.php");exit();
}

$db->sql = "update users set cornfirm_photo=? where user_id=?";
$db->veri = array( 1,$id );
$guncelle = $db->update();

if ($guncelle == true) {
	header("location:index.php?url=uye_foto&islem=guncellendi");
}else{
	header("location:index.php?url=uye_foto&islem=guncellenmedi");
}
?>