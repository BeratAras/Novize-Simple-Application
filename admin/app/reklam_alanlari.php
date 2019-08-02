<head>
  <meta charset="utf8mb4_bin"/>
</head>
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
        <h1 class="page-header">Reklam Alanları</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php
            if (isset($_POST["guncelle1"])) {
              $reklamalan1 = post("reklamalan1");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan1, date("d, m, y"), "ReklamAlan1");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle2"])) {
              $reklamalan2 = post("reklamalan2");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan2, date("d, m, y"), "ReklamAlan2");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle3"])) {
              $reklamalan3 = post("reklamalan3");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan3, date("d, m, y"), "ReklamAlan3");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle4"])) {
              $reklamalan4 = post("reklamalan4");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan4, date("d, m, y"), "ReklamAlan4");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle5"])) {
              $reklamalan5 = post("reklamalan5");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan5, date("d, m, y"), "ReklamAlan5");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle6"])) {
              $reklamalan6 = post("reklamalan6");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan6, date("d, m, y"), "ReklamAlan6");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>

              <?php
            if (isset($_POST["guncelle7"])) {
              $reklamalan7 = post("reklamalan7");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklamalan7, date("d, m, y"), "ReklamAlan7");
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Yazı Güncellendi! <a href="#" class="alert-link">Yeni Ekle</a>.
                    </div>';
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Yazı Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

             }
             ?>


           </div>
           <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Yazı Bilgileri
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">


                    <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan1");
                        $reklamalan1 = $db->select();
                        foreach ($reklamalan1 as $key => $value) {
                        ?>
                        <label>Reklam Alan 1</label>
                        <textarea name="reklamalan1" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                      <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle1" value="Güncelle" class="btn btn-info">
                    </form>

                    <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan2");
                        $reklamalan2 = $db->select();
                        foreach ($reklamalan2 as $key => $value) {
                         ?>
                        <label>Reklam Alan 2</label>
                        <textarea name="reklamalan2" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle2" value="Güncelle" class="btn btn-info">
                    </form>


                     <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan3");
                        $reklamalan3 = $db->select();
                        foreach ($reklamalan3 as $key => $value) {
                         ?>
                        <label>Reklam Alan 3</label>
                        <textarea name="reklamalan3" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle3" value="Güncelle" class="btn btn-info">
                    </form>

                     <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan4");
                        $reklamalan4 = $db->select();
                        foreach ($reklamalan4 as $key => $value) {
                         ?>
                        <label>Reklam Alan 4</label>
                        <textarea name="reklamalan4" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle4" value="Güncelle" class="btn btn-info">
                    </form>

                     <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan5");
                        $reklamalan5 = $db->select();
                        foreach ($reklamalan5 as $key => $value) {
                         ?>
                        <label>Reklam Alan 5</label>
                        <textarea name="reklamalan5" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle5" value="Güncelle" class="btn btn-info">
                    </form>

                     <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan6");
                        $reklamalan6 = $db->select();
                        foreach ($reklamalan6 as $key => $value) {
                         ?>
                        <label>Reklam Alan 6</label>
                        <textarea name="reklamalan6" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle6" value="Güncelle" class="btn btn-info">
                    </form>

                     <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group ckeditor">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamAlan7");
                        $reklamalan7 = $db->select();
                        foreach ($reklamalan7 as $key => $value) {
                         ?>
                        <label>Reklam Alan 7</label>
                        <textarea name="reklamalan7" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle7" value="Güncelle" class="btn btn-info">
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