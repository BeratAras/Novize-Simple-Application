<?php 

if(!get("id")){
	header("location:index.php");exit();
}

$id=(int)get("id");

$db->sql = "select * from comments where comment_id";
$db->veri = array( $id );

$yorum = $db->select(1);

if ($yorum == false) {
	header("location:index.php");exit();
}

$db->sql = "update comments set confirmed=? where comment_id=?";
$db->veri = array( 1,$id );
$guncelle = $db->update();

if ($guncelle == true) {
	header("location:index.php?url=yorumlar&islem=guncellendi");
}else{
	header("location:index.php?url=yorumlar&islem=guncellenmedi");
}


?>