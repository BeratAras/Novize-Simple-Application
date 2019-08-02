<?php 

if(!get("id")){
	header("location:index.php");exit();
}

$id=(int)get("id");

$db->sql = "select * from visitors where visitors_id";
$db->veri = array( $id );

$yorum = $db->select(1);

if ($yorum == false) {
	header("location:index.php");exit();
}

$db->sql = "delete from visitors where visitors_id=?";
$db->veri = array( $id );
$sil = $db->delete();

if ($sil == true) {
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=ziyaretciler&islem=silindi'</script>");
	}else
	{
	header("Location: index.php?url=ziyaretciler&islem=silindi");
	}
}else{
	if(headers_sent())
    { // headers gönderilmişse javascript ile yönlendir.
    echo("<script>location.href='index.php?url=ziyaretciler&islem=silinemedi'</script>");
	}else
	{
	header("Location: index.php?url=ziyaretciler&islem=silinemedi");
	}
}


?>