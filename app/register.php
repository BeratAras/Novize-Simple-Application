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
                $kullanici = post("kullanici");
                $sifre = post("sifre");
                $sifretekrar = post("sifretekrar");
                $eposta = post("eposta");
                $ulke = post("ulke");
                $dg = post("dg");
                $cinsiyet = post("cinsiyet");

                if($kullanici=="" or $sifre=="" or $eposta=="" or $ulke=="" or $dg=="" or $cinsiyet=="")
                {
                    echo '<div class="alert alert-danger"><strong>Kayıt Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
                }else if($sifre != $sifretekrar){
                  echo '<div class="alert alert-danger"><strong>Kayıt Başarısız!</strong> Şifreniz Uyuşmuyor!</div>';
                }else{
                    $db->sql = "insert into users set username=?, pass=?, email=?, born=?, sex=?, country=?, regi_date=?, confirmed=?";
                    $db->veri = array($kullanici, $sifre, $eposta, $dg, $cinsiyet, $ulke, date("d,m,y"), 0);
                    $ekle = $db->insert();
                    if($ekle){
                      echo '<div class="alert alert-success"><strong>Kayıt Başarılı!</strong> Giriş Yap!</div>';
                  }else{
                    echo '<div class="alert alert-danger"><strong>Kayıt Başarısız!</strong> İstenmeyen Bir Hata Oldu!</div>';
                }
            }

        }

        ?>
          <!-- /Login İşlemleri Başlangıç -->

         <form  enctype="multipart/form-data" class="login-form" method="POST"  style="margin-top:0%;"> <!--- Kayıt Ol Form --->

          <div class="form-group" style="margin-top: 40px;">
            <label>Kullanıcı Ad:</label>
            <input type="text" name="kullanici" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre:</label>
            <input type="password" name="sifre" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre Tekrar:</label>
            <input type="password" name="sifretekrar" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">E-Posta Adresi:</label>
            <input type="mail" name="eposta" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Yaşadığın Ülke</label>
            <select class="form-control" name="ulke">
              <option>Türkiye</option>
                        <option>Almanya</option>
                        <option>Arnavutluk</option>
                        <option>Avustralya</option>
                        <option>Avusturya</option>
                        <option>Azerbaycan</option>
                        <option>Belarus</option>
                        <option>Belçika</option>
                        <option>Bosna Hersek</option>
                        <option>Bulgaristan</option>
                        <option>Çekya</option>
                        <option>Danimarka</option>
                        <option>Fransa</option>
                        <option>Gürcistan</option>
                        <option>Hırvatistan</option>
                        <option>Hollanda</option>
                        <option>İtalya</option>
                        <option>Irak</option>
                        <option>İngiltere</option>
                        <option>İran</option>
                        <option>İrlanda</option>
                        <option>İspanya</option>
                        <option>İsveç</option>
                        <option>İsviçre</option>
                        <option>Kanada</option>
                        <option>Karadağ</option>
                        <option>Kazakistan</option>
                        <option>Kırgızistan</option>
                        <option>KKTC</option>
                        <option>Letonya</option>
                        <option>Litvanya</option>
                        <option>Macaristan</option>
                        <option>Makedonya</option>
                        <option>Moldova</option>
                        <option>Norveç</option>
                        <option>Özbekistan</option>
                        <option>Rusya</option>
                        <option>Sırbistan</option>
                        <option>Slovakya</option>
                        <option>Suriye</option>
                        <option>Tacikistan</option>
                        <option>Türkmenistan</option>
                        <option>Ukrayna</option>
                        <option>USA</option>
                        <option>Yunanistan</option>
                        <option>Diğer Ülkeler</option>
               ?>
            </select>
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Doğum Tarihi:</label>
            <input type="date" name="dg" class="form-control">
          </div>

           <div class="form-group">
            <label for="exampleFormControlSelect1">Cinsiyet:</label>
            <select class="form-control" name="cinsiyet">
              <option>Kadın</option>
              <option>Erkek</option>
            </select>
          </div>

          <button type="submit" name="kayitol" value="kayitol" class="btn btn-primary text-center">Kayıt Ol</button>
          <button name="girisgeri" value="geri dön" class="btn btn-danger text-center"><a style="color: white; text-decoration: none;" href="index.php?url=login">Anasayfaya Dön</a></button>
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


