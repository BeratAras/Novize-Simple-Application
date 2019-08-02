<?php takip(); ?>
<?php require 'inc/ust.php' ?>
<?php require 'inc/header.php' ?>
<main>
  <div class="container-fluid" style="background-color: #E9EBEE;">
    <div class="container-fluid" id="icerik">
      <div class="row">
        <div class="col" id="sol">
          <!---Sol Menü--->
          <?php require 'inc/icerik_sol.php' ?>
          <!---/Sol Menü--->
        </div>

        <div class="col-6" style="margin-top: 10px;" id="orta">

         <!-- Login İşlemleri Başlangıç -->
         <?php

         if(pisset())
         {
          $user_id = $_SESSION['user_id'];
          $user_country = $_SESSION['user_country'];
          $konu_baslik = post("konubaslik");
          $aciklama = post("aciklama");
          date_default_timezone_set("Europe/Istanbul");
          setlocale(LC_TIME, 'tr_TR');

          if($konu_baslik=="" or $aciklama=="")
          {
            echo '<div class="alert alert-danger"><strong>Ekleme Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
          }else{

            $db->sql = "insert into news set user_id=?, heading=?, text=?, post_country=?, confirmed=?, date=?";
            $db->veri = array($user_id, $konu_baslik, $aciklama, $user_country, 0, date("d, m, y"));
            $ekle = $db->insert();
            if($ekle){
              echo '<div class="alert alert-success"><strong>Ekleme Başarılı!</strong></div>';
            }else{
              echo '<div class="alert alert-danger"><strong>Ekleme Başarısız!</strong> İstenmeyen Bir Hata Oldu!</div>';
            }
          }

        }

        ?>
        <!-- /Login İşlemleri Başlangıç -->

        <form  enctype="multipart/form-data" class="login-form " method="POST"  style="margin-top:0%;"> <!--- Kayıt Ol Form --->

          <div class="form-group" style="margin-top: 40px;">
            <label>Konu Başlığı</label>
            <input type="text" name="konubaslik" class="form-control">
          </div>

          <div class="form-group">
            <label>Açıklama</label>
            <textarea class="form-control" name="aciklama" rows="8"></textarea>
          </div>
          <button type="submit" name="kayitol" value="kayitol" class="btn btn-primary text-center">Ekle</button>
          <button name="girisgeri" value="geri dön" class="btn btn-danger text-center"><a style="color: white; text-decoration: none;" href="index.php">Anasayfaya Dön</a></button>
        </form>


      </div>
      <div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
        <?php require 'inc/icerik_sag.php' ?>
      </div>
    </div>
  </div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>


