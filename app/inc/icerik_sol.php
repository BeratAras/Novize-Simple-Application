<div style="margin-top: 16px; color: white; text-align: center; margin-right: 0px;">

   <?php
            if(isset($_POST['girisyap']))
            {
                $kullanici = post("kullanici");
                $sifre = post("sifre");

                if($kullanici=="" or $sifre=="")
                {
                    echo '<div class="alert alert-danger"><strong>Giriş Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
                }else {

                    $db->sql = "select * from users where username = ? and pass = ? and confirmed = ?"; //burda yazılıyor
                    $db->veri = array($kullanici, $sifre, 1);

                    $users = $db->select(1); 


                    if( $users !=false ) {
                        $_SESSION['username'] = $users->username;
                        $_SESSION['user_id'] = $users->user_id;
                        $_SESSION['user_country'] = $users->country;
                        $_SESSION['profile_photo'] = $users->profile_photo;
                        header("location: index.php?url=anasayfa");
                        exit();
                    }else{
                        echo '<div class="alert alert-danger"><strong>Giriş Başarısız!</strong> Kullanıcı adı veya şifreniz yanlış!</div>';
                    }
                }
            }

          

if(!isset($_SESSION['username'])){   ?>
  <form method="POST" style=" margin-top: 38px; background-color: #2E3235; padding: 20px; ">
    <div class="form-group">
      <input type="text" class="form-control"  name="kullanici" placeholder="Kullanıcı Adı">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="sifre" placeholder="Şifre">
    </div>
    <div class="form-group">
      <label><a href="index.php?url=sifremi_unuttum">Şifremi Unuttum!</a></label>
    </div>
    <button type="submit" name="girisyap" class="btn btn-primary">Giriş</button>
    <button  class="btn btn-success"><a style="color: white; text-decoration: none;" href="index.php?url=register">Üye Ol</a></button>
  </form>


<div class="list-group text-left">
  <button type="text" class="list-group-item list-group-item-action active">
    KONTROL PANELİ
  </button>

  <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
    ARAMA
  </button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Üye Adı</a></button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Başlık</a></button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Kelime</a></button>

  <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
   KONU BAŞLIKLARI
 </button>
 <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=tuyolar">Tüyolar</a></button>
 <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=faydalilink">Faydalı Linkler</a></button>

 <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
  DESTEK
</button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=sss">S.S.S</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=site_kurallari">Site Kuralları</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=hakkimizda">Hakkımızda</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=gizlilik">Gizlilik</a></button>
</div>
<?php 
}else{
 ?>
</div>
<div style="margin-top: 58px; color: white; text-align: center; margin-right: 0px;">
<div class="list-group text-left"> 
  <img src="<?=$value->profile_photo?>" alt="..." class="img-responsive w-75 h-75 rounded-pill mx-auto d-block">
  <h4 class="text-white text-center bg-dark p-2"><?php echo $_SESSION['username'];?></h4>
  <button type="text" class="list-group-item list-group-item-action active">
    KONTROL PANELİ
  </button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=sistem_mesaj">Sistem Mesajları</a></button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=yardim_talebi_cevaplari">Yardım Talebi Cevapları</a></button>
  
  <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
    HESAP AYARLARI
  </button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=user_profil&id=<?=$value->user_id; ?>">Profili Göster</a></button> 
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=user_settings">Profili Düzenle</a></button>

  <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
   ARAMA
 </button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Üye Adı</a></button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Başlık</a></button>
  <button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=arama">Kelime</a></button>

 <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
  KONU BAŞLIKLARI
</button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=tuyolar">Tüyolar</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=faydalilink">Faydalı Linkler</a></button>

 <button type="button" class="list-group-item list-group-item-action list-group-item-dark">
  DESTEK
</button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=sss">S.S.S</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=site_kurallari">Site Kuralları</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=hakkimizda">Hakkımızda</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=gizlilik">Gizlilik</a></button>
<button type="button" class="list-group-item list-group-item-action"><a href="index.php?url=yardimtalebi">Yardım Talebi</a></button>
</div>

 <?php 
}
 ?>

</div>