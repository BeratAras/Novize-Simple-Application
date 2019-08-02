<?php 
require_once 'database.php';
function pr($param)
{
  echo "<pre>"; print_r($param); echo "</pre>";
}

/**
 * [pisset $_POST dizisinin varlığını kontrol eder]
 * @return [true/false] [var ise true yok ise false döndürür.]
 */
function pisset()
{
  if( $_POST ){ return true; }else{ return false; }
}
/**
 * [pisset $_GET dizisinin varlığını kontrol eder]
 * @return [true/false] [var ise true yok ise false döndürür.]
 */   
function gisset()
{
  if( $_GET ){ return true; }else{ return false; }
}
/**
 * [post $_POST[$param] var ise kendisini geri döndürür. boşlukları siler.]
 * @param  [string] $param [post içindeki değişkenin ismi]
 * @return [string/false]        [var ise / yok ise]
 */
function post($param)
{
  if (isset($_POST[$param])) {
    return trim($_POST[$param]);
  }else{
    return false;
  }
}
/**
 * [post $_GET[$param] var ise kendisini geri döndürür. boşlukları siler.]
 * @param  [string] $param [get içindeki değişkenin ismi]
 * @return [string/false]        [var ise / yok ise]
 */   
function get($param)
{
  if (isset($_GET[$param])) {
    return trim($_GET[$param]);
  }else{
    return false;
  }
}


  function takip(){
  Global $db;
  $ip = $_SERVER['REMOTE_ADDR'];
  if(@$_SERVER['HTTP_REFERER']){
    $geldigi =  @$_SERVER['HTTP_REFERER'];
  }else{
    $geldigi =  "Yok";
  }
  $tarayici = $_SERVER['HTTP_USER_AGENT'];
  $dil = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


  //Olaslıklar
  if($dil == "tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7"){
    $dil = "TR";
  }
  if ($dil == "tr-tr") {
    $dil = "TR";
  }

   if($dil == "en-US,en;q=0.8"){
        $dil = "US";
  }
  
  if($dil == "ru, uk;q=0.8, be;q=0.8, en;q=0.7, *;q=0.01"){
        $dil = "RU";
  }


  if($tarayici == "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.87 Safari/537.36"){
        $tarayici = "Chrome / Windows";
  }

  if($tarayici == "Mozilla/5.0 (iPhone; CPU iPhone OS 12_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E148 Safari/604.1"){
        $tarayici = "Safari / Iphone";
  }

  if($tarayici == "Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.1 Mobile/15E148 Safari/604.1"){
        $tarayici = "Safari / Iphone";
  }

  if($tarayici == "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.87 Safari/537.36"){
        $tarayici = "Chrome / Windows";
  }

 

  

  //-Olaslıklar-




  $db->sql = "insert into visitors set ip=?, geldigi=?, tarayici=?, dil=?";
  $db->veri = array($ip, $geldigi, $tarayici, $dil);
  $ekle = $db->insert();
  if($ekle) echo "";
  else echo "";
}

/*function online($ip){
   Global $db;
   date_default_timezone_get("Europe/Istanbul");
   setlocale(LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');
   $zaman = date("Y-m-d H:i:s", time()-600);
   $db->sql = "select * from visitors where ip=? and TIMESTAMP(zaman) > '$zaman'";
   $veriler = $db->veri = array($ip);
   $verisay = $veriler->rowCount();
   if ($verisay > 0) {
      return 1;
   }else{
      return 0;
   }
}
*/