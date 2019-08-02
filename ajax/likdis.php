<?php 
require_once '../system/sabitler.php';
require_once '../system/functions.php';
require_once '../system/database.php';

$post_id = $_REQUEST["post_id"];
$tur = $_REQUEST["tur"];

session_start();
$user_id = $_SESSION['user_id'];

//Like = 1, Dislike = 0, Düştüm = 2, WTF = 3, Doru = 4, Cringe = 5

if($tur == "1"){
        
    $db->sql = "select * from news_like WHERE user_id=? and post_id=?";
    $db->veri = array($user_id,$post_id);
    $sec = $db->select();
    
    if($sec == true){
        foreach($sec as $key => $value){
        $like_id = $value->like_id;
        $durum = $value->like_result; 
        }
        if($durum == 1){ //Durum zaten 1 ise ve tekrar 1'e basarsa beğeniyi siler.
            $db->sql = "delete from news_like WHERE like_id=?";
            $db->veri = array($like_id);
            $delete = $db->delete();
            echo "boş"; //Boş burda ne beğeni ne beğenmeme ikisinede basılmadı demektir.
        }
        else{ //durum dislike ise update yapıp like'a çeviriyor.
            $db->sql = "Update news_like SET like_result=? WHERE like_id=?";
            $db->veri = array("1",$like_id);
            $upd = $db->update();
            echo "1-0"; //durum 0'dan 1'e dönüşüyor.
        }
    }
    else{  
        date_default_timezone_set("Europe/Istanbul");
        setlocale(LC_TIME, 'tr_TR');
        $like_date = strftime("%H:%M %A");  
        $db->sql = "insert into news_like set user_id=?, post_id=?, like_date=?, like_result=?";
        $db->veri = array($user_id,$post_id,$like_date,"1");
        $ekle = $db->insert();
        echo "1-1";
    }
}

else if($tur == "0"){
    $db->sql = "select * from news_like WHERE user_id=? and post_id=?";
    $db->veri = array($user_id,$post_id);
    $sec = $db->select();
    
    if($sec == true){
        foreach($sec as $key => $value){
        $like_id = $value->like_id;
        $durum = $value->like_result; 
        }
        if($durum == 0){
            $db->sql = "delete from news_like WHERE like_id=?";
            $db->veri = array($like_id);
            $delete = $db->delete();
            echo "boş";
        }
        else{ 
            $db->sql = "Update news_like SET like_result=? WHERE like_id=?";
            $db->veri = array("0",$like_id);
            $upd = $db->update();
            echo "0-0";
        }
    }
    else{  
        date_default_timezone_set("Europe/Istanbul");
        setlocale(LC_TIME, 'tr_TR');
        $like_date = strftime("%H:%M %A");  
        $db->sql = "insert into news_like set user_id=?, post_id=?, like_date=?, like_result=?";
        $db->veri = array($user_id,$post_id,$like_date,"0");
        $ekle = $db->insert();
        echo "0-1";
    }
}


else{
    echo "Kurcalama"; exit;
}
?>
