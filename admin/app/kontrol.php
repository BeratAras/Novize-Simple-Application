<?php require 'inc/ust.php' ?> 
<div id="wrapper">


  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <?php 
   require 'inc/ust_nav.php';
   require 'inc/sol_nav.php';
   ?>
 </nav>

 <!-- Page Content -->
 <div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Kontrol</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">


            <?php
            if (isset($_POST["logo_guncelle"])) {

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

              $db->sql = "update site_settings set set_text=? where set_type=?";
              $db->veri = array($refimgyol,"logo");
              $guncelle = $db->update();
              if($guncelle){ 
                echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                Logonuz Başarıyla Güncellendi! <a href="#" class="alert-link"></a>
                </div>';
                header("Refresh: 0.0;");
              }else{
               echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
               Logonuz Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
               </div>';
             }

           }
           ?> 


           <?php
           if (isset($_POST["guncelle"])) {
            $mail = post("mail");

            $db->sql = "update site_settings set set_text=? where set_type=?";
            $db->veri = array($mail, "site_mail");
            $guncelle = $db->update();
            if($guncelle){
              echo '<div class="alert alert-success"> <strong>Başarılı </strong>
              Bilgiler Güncellendi! <a href="#" class="alert-link"></a>
              </div>';
              header("Refresh: 2.0;");
            }else{
             echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
             Bilgiler Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
             </div>';
           }

         }
         ?>

         <?php
         if (isset($_POST["guncelle"])) {
          $title = post("title");

          $db->sql = "update site_settings set set_text=? where set_type=?";
          $db->veri = array($title, "title");
          $guncelle = $db->update();
        }
        ?>


        <?php
        if (isset($_POST["guncelle"])) {
          $keywords = post("keywords");

          $db->sql = "update site_settings set set_text=? where set_type=?";
          $db->veri = array($keywords, "keywords");
          $guncelle = $db->update();
        }
        ?>

        <?php
        if (isset($_POST["guncelle"])) {
          $description = post("description");

          $db->sql = "update site_settings set set_text=? where set_type=?";
          $db->veri = array($description, "description");
          $guncelle = $db->update();
        }
        ?>



      </div>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Kontrol
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">

                <form role="form" method="POST"> <!-- Konu Post-Form Kısmı --> 
                  <?php 
                  $db->sql = "select * from site_settings where set_type=?";
                  $db->veri = array("logo");
                  $logo_getir = $db->select();
                  foreach ($logo_getir as $key => $value) {
                   ?>
                   <div class="form-group">
                    <label>Logonuzu Yükleyin</label>
                    <input name="foto" type="file" class="form-control-file" value="<?=$value->set_text?>">
                  
                  </div>
                  <input type="submit" name="logo_guncelle" value="Logo Güncelle" class="btn btn-dark">
                  <small>Dikkat Boşken Yükleye Tıklamayın! Logo Gider!</small>
                 <a href="#"><img  style="margin-left: 15px;" src="../<?=$value->set_text?>" width="200" height="40"  alt=""></a> 
                  <br> <br>

                   <a href="index.php?url=ziyaretciler"><button href="" class="btn btn-dark">Ziyaretçiler</a></button>
               
                   
                   <!---Arama Kutusu--->
                <!-- <br>
                <div class="card" style="width: 18rem;">
                <br>
                 <img class="mr-2" src="<?=$value->set_text?>" width="500" height="300" height="40"  alt="">
                  <div class="card-body">
                    <p class="card-text">Mevcut Logonuz</p>
                  </div>
                </div> -->
                <?php
              }
              ?>
              <?php 
              $db->sql = "select set_text from site_settings where set_type = ?";
              $db->veri = array("site_mail");
              $site_ayar = $db->select();
              foreach ($site_ayar as $key => $value) {
               ?>            
               <div class="form-group">
                <br>
                <label>Site E-Posta:</label>
                <textarea  style= "resize:none;" rows="1" type="text" name="mail" class="form-control" text=""><?=$value->set_text;?></textarea> 
              </div>
              <?php
            }
            ?>

            <?php 
            $db->sql = "select * from site_settings where set_type = ?";
            $db->veri = array("title");
            $site_ayar = $db->select();
            foreach ($site_ayar as $key => $value) {
             ?>    
             <div class="form-group">
              <label>Title:</label>
              <textarea  style= "resize:none;" rows="1" type="text" name="title" class="form-control" text=""><?=$value->set_text;?></textarea> 
            </div>
            <?php
          }
          ?>

          <?php 
          $db->sql = "select * from site_settings where set_type = ?";
          $db->veri = array("keywords");
          $site_ayar = $db->select();
          foreach ($site_ayar as $key => $value) {
           ?>    
           <div class="form-group">
            <label>Keywords:</label>
            <textarea  style= "resize:none;" rows="10" type="text" name="keywords" class="form-control" text=""><?=$value->set_text;?></textarea> 
          </div>
          <?php
        }
        ?>

        <?php 
        $db->sql = "select * from site_settings where set_type = ?";
        $db->veri = array("description");
        $site_ayar = $db->select();
        foreach ($site_ayar as $key => $value) {
         ?>
         <div class="form-group">
          <label>Description:</label>
          <textarea  style= "resize:none;" rows="5" type="text" name="description" class="form-control" text=""><?=$value->set_text;?></textarea> 
        </div>
        <?php
      }
      ?>
      <input type="submit" name="guncelle" value="Güncelle" class="btn btn-info">
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php require 'inc/alt.php' ?>