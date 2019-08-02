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

        <div class="col-6" style="margin-top: 50px;" id="orta">

            <!---Arama Kutusu--->
     
    <?php 
         if(isset($_POST["textara"])){
          $text = post("textara");
          $db->sql = "select * FROM news WHERE text = '".$text."'";
          $ara_icerik = $db->select(); 
          strip_tags($ara_icerik);
          if($ara_icerik){
            foreach ($ara_icerik as $key => $value) { 
              $aranacak = $value->text;
              if ($text == $aranacak) {
                header("Location: index.php?url=konuara&konu=$value->text");
              }else{
                echo "aradığınız içerik bulunamadı.";
              }break;
            } 
          }
        }
        ?>

        <?php 
         if(isset($_POST["uyeara"])){
          $uye = post("uyeara");
          $db->sql = "select * FROM users WHERE username = '".$uye."'";
          $ara_uye = $db->select(); 
          if($ara_uye){
            foreach ($ara_uye as $key => $value) { 
              $aranacak = $value->username;
              if ($uye == $aranacak) {
                header("Location: index.php?url=user_ara&id=$value->username");
              }else{
                echo "aradığınız içerik bulunamadı.";
              }break;
            } 
          }
        }
        ?>

     <form  class="form-inline my-2 my-lg-0" style="width: 100%; margin-left: 55px; margin-top: 50px;" method="POST">
          <input name="uyeara" class="form-control mr-sm-2 w-75" type="search" placeholder="Üye Adı" aria-label="Search">
          <button name="uyeara" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Ara</button>
        </form>
        <br>
         <form  class="form-inline my-2 my-lg-0" style="width: 100%; margin-left: 55px; margin-top: 50px;" method="POST">
          <input name="baslikara" class="form-control mr-sm-2 w-75" type="search" placeholder="Başlık" aria-label="Search">
          <button name="baslikara" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Ara</button>
        </form>
        <br>
         <form  class="form-inline my-2 my-lg-0" style="width: 100%; margin-left: 55px; margin-top: 50px;" method="POST">
          <input name="textara" class="form-control mr-sm-2 w-75" type="search" placeholder="Kelime" aria-label="Search">
          <button name="textara" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Ara</button>
        </form>
        <!---/Arama Kutusu--->

          </div>
          <div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
            <?php require 'inc/icerik_sag.php' ?>
          </div>
        </div>
      </div>
    </main>

    <?php require 'inc/footer.php' ?>

    <?php require 'inc/alt.php' ?>


