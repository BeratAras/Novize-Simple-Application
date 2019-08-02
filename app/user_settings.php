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
          <?php
          if (isset($_POST["guncelle"])) {
            $user_id = $_SESSION['user_id'];
            $pass = post("pass");
            $country = post("country");
            $born = post("born");
            $mail = post("mail");

            $db->sql = "update users set pass=?, country=?, born=?, email=? where user_id=?";
            $db->veri = array($pass,$country, $born, $mail, $user_id);
            $guncelle = $db->update();
            if($guncelle){ 
              echo '<div class="alert alert-success"> <strong>Başarılı </strong>
              Kullanıcı Bilgileri Güncellendi! <a href="#" class="alert-link"></a>
              </div>';
              header("Refresh: 3.0;");
            }else{
             echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
             Kullanıcı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
             </div>';
           }

         }
         ?> 

         <?php 
         if (isset($_POST["fotosil"])) {
          $user_id = $_SESSION['user_id'];

          @$tmp_name = $_FILES['foto']["tmp_name"];
          @$name = $_FILES['foto']["name"];
          $benzersizsayi1=rand(20000,32000);
          $benzersizsayi2=rand(20000,32000);
          $benzersizsayi3=rand(20000,32000);
          $benzersizsayi4=rand(20000,32000);
          $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
            $refimgyol= "public/img/user_defult.png"; //uykum var biliyormusun :D
            @move_uploaded_file($tmp_name, "public/img/user_defult.png");

            $db->sql = "update users set profile_photo=? where user_id=?";
            $db->veri = array($refimgyol, $user_id);
            $fotosil = $db->update();
            if($fotosil){ 
              echo '<div class="alert alert-success"> <strong>Başarılı </strong>
              Fotoğraf Silindi! <a href="#" class="alert-link"></a>
              </div>';
            }else{
             echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
             Fotoğraf Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
             </div>';
           }

         }
         ?> 


         <?php 
         if (isset($_POST["fotoguncelle"])) {
          $user_id = $_SESSION['user_id'];

          $uploads_dir = 'public/img/kullanici';
          @$tmp_name = $_FILES['foto']["tmp_name"];
          @$name = $_FILES['foto']["name"];
          $benzersizsayi1=rand(20000,32000);
          $benzersizsayi2=rand(20000,32000);
          $benzersizsayi3=rand(20000,32000);
          $benzersizsayi4=rand(20000,32000);
          $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
           
            $refimgyol=$uploads_dir."/".$benzersizad.$name;
            @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

            $db->sql = "update users set profile_photo=?, cornfirm_photo=? where user_id=?";
            $db->veri = array($refimgyol, 0, $user_id);
            $fotoguncelle = $db->update();
            if($fotoguncelle){ 
              echo '<div class="alert alert-success"> <strong>Başarılı </strong>
              Fotoğraf Güncellendi! <a href="#" class="alert-link"></a>
              </div>';
            }else{
             echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
             Fotoğraf Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
             </div>';
           }

         }
         ?> 

         <?php 
         if (isset($_POST["uyelik_sil"])) {
          $user_id = $_SESSION['user_id'];

          $db->sql = "delete from users where user_id=?";
          $db->veri = array($user_id);
          $uyelik_sil = $db->delete();
          if($uyelik_sil){ 
            echo '<div class="alert alert-success"> <strong>Başarılı </strong>
            Üyeliğiniz Silindi! <a href="#" class="alert-link"></a>
            </div>';
            header("Location: index.php?url=logout");
          }else{
           echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
           Üyeliğiniz Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
           </div>';
         }

       }
       ?> 


       <?php 
       $user_id = $_SESSION['user_id'];
       $db->sql = "select * from users INNER JOIN countries ON users.country=countries.country where user_id=? and confirmed=?";
       $db->veri = array($user_id,1);
       $userbilgi = $db->select();

       if ($userbilgi == false) {
        echo "Hiç Mesaj Yok";
      }else{
        foreach ($userbilgi as $key => $value) {
          ?>
          <form method="POST"  enctype="multipart/form-data">
            <div class="card mb-3" style="max-width: 100%; margin-top: 26px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src=" <?=$value->profile_photo?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?=$value->username?></h5>

                    <div class="form-group">
                      <label>Fotoğraf Yükle</label>
                      <input  name="foto" type="file" class="form-control-file">
                    </div>

                    <button name="fotoguncelle" class="btn btn-success" placeholder="Fotoğraf Güncelle" type="submit">Fotoğrafı Güncelle</button>
                    <button name="fotosil" class="btn btn-dark" placeholder="Fotoğraf Sil" type="submit">Fotoğrafı Sil</button>
                    <br> <br>
                    <label>Şifre:</label>
                    <textarea type="password" name="pass" row="1" class="form-control card-text"> <?=$value->pass?></textarea>
                    <br>
                    <i class="fas fa-map-marker-alt"></i>    
                    <div class="form-group">
                      <select class="form-control" name="country">
                        <option><?=$value->country?></option>
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
                        <option>Rusya</option> <!--- --->
                        <option>Sırbistan</option> <!--- --->
                        <option>Slovakya</option>
                        <option>Suriye</option>
                        <option>Tacikistan</option>
                        <option>Türkmenistan</option>
                        <option>Ukrayna</option>
                        <option>USA</option>
                        <option>Yunanistan</option>
                        <option>Diğer Ülkeler</option>
                      </select>
                    </div>
                    <br>
                    <i class="fas fa-birthday-cake"></i>
                    <textarea name="born" class="form-control card-text"> <?=$value->born?></textarea>
                    <br>
                    <i class="fas fa-envelope"></i>
                    <textarea name="mail" class="form-control card-text"> <?=$value->email?></textarea>
                    <br>

                    <p class="card-text"><i class="fas fa-user-clock"></i> <?=$value->regi_date?></p>
                    <button name="guncelle" class="btn btn-primary" placeholder="Güncelle" type="submit">Güncelle</button>
                    <button name="uyelik_sil" class="btn btn-danger" placeholder="Üyeliğini Sil" type="submit">Üyeliğini Sil</button>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                  </div>
                </div>
              </div>
            </div>
          </form>
          <?php 
        }
      }
      ?>

    </div>
    <div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
      <?php require 'inc/icerik_sag.php' ?>
    </div>
  </div>
</div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>


