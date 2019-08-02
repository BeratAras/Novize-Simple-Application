<?php 

if(!get("id")){
	header("location:index.php");exit();
}

$id=(int)get("id");

$db->sql = "select * from news where post_id";
$db->veri = array( $id );

$konu = $db->select(1);

if ($konu == false) {
	header("location:index.php");exit();
}

$db->sql = "update news set confirmed=? where post_id=?";
$db->veri = array( 1,$id );
$guncelle = $db->update();

if ($guncelle == true) {
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=konular&islem=guncellendi");
	}else
	{
	header("Location: index.php?url=konular&islem=guncellendi");
	}
}else{
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=konular&islem=guncellenmedi");
	}else
	{
	header("Location: index.php?url=konular&islem=guncellenmedi");
	}
}


?>