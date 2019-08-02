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

$db->sql = "delete from news where post_id=?";
$db->veri = array( $id );
$sil = $db->delete();

if ($sil == true) {
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=konular&islem=silindi");
	}else
	{
	header("Location: index.php?url=konular&islem=silindi");
	}
}else{
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=konular&islem=silinemedi");
	}else
	{
	header("Location: index.php?url=konular&islem=silinemedi");
	}
}


?>