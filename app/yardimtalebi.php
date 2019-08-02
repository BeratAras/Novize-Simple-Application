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

         if(isset($_POST["gonder"]))
         {
          $user_id = $_SESSION['user_id'];
          $user_name = $_SESSION['username'];
          $yardim_baslik = post("yardimbaslik");
          $yardim_aciklama = post("yardimaciklama");

          date_default_timezone_set("Europe/Istanbul");
          setlocale(LC_TIME, 'tr_TR');

          if($yardim_baslik=="" or $yardim_aciklama=="")
          {
            echo '<div class="alert alert-danger"><strong>Gönderim Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
          }else{

            $db->sql = "insert into messages set user_id=?, sender=?, recipient=?, text=?, type=?, date=?, result=?, result_confirmed=?";
            $db->veri = array($user_id, $user_name, "admin", $yardim_aciklama, $yardim_baslik, date("d, m, y"), "", 0);
            $ekle = $db->insert();
            if($ekle){
              echo '<div class="alert alert-success"><strong>Talebiniz Başarılı Bir Şekilde Gönderildi!</strong></div>';
            }else{
              echo '<div class="alert alert-danger"><strong>Gönderim Başarısız!</strong> İstenmeyen Bir Hata Oldu!</div>';
            }
          }

        }

        ?>
        <!-- /Login İşlemleri Başlangıç -->

        <form  enctype="multipart/form-data" class="login-form " method="POST"  style="margin-top:0%;"> <!--- Kayıt Ol Form --->

          <div class="form-group" style="margin-top: 40px;">
            <h4 class="text-center">Yardım Talebi</h4>
              <label for="exampleFormControlSelect1">Konu Başlığı:</label>
              <select class="form-control" name="yardimbaslik">
                <option>TEKNİK DESTEK</option>
                <option>SİTE HAKKINDA GÖRÜŞ ve ÖNERİLER</option>
                <option>ÜYELİK SORULARI</option>
                <option>REKLAM KONULARI</option>
                <option>ŞİKAYET</option>
                <option>DİĞER KONULAR</option>
              </select>
          </div>

          <div class="form-group">
            <label>Açıklama</label>
            <textarea class="form-control" name="yardimaciklama" rows="8"></textarea>
          </div>
          <button type="submit" name="gonder" value="Gönder" class="btn btn-primary text-center">Ekle</button>
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


