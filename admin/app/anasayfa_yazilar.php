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
        <h1 class="page-header">Anasayfa Yazı Güncelle</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php
            if (isset($_POST["guncelle1"])) {
              $yazi1 = post("yazi1");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($yazi1, date("d, m, y"), "AnaYazi1");
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
              $yazi2 = post("yazi2");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($yazi2, date("d, m, y"), "AnaYazi2");
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
              $yazi3 = post("yazi3");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($yazi3, date("d, m, y"), "AnaYazi3");
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
              $yazi4 = post("yazi4");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($yazi4, date("d, m, y"), "AnaYazi4");
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
                        $db->veri = array("AnaYazi1");
                        $yazi1 = $db->select();
                        foreach ($yazi1 as $key => $value) {
                        ?>
                        <label>Yazı 1</label>
                        <textarea name="yazi1" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
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
                        $db->veri = array("AnaYazi2");
                        $yazi1 = $db->select();
                        foreach ($yazi1 as $key => $value) {
                         ?>
                        <label>Yazı 2</label>
                        <textarea name="yazi2" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
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
                        $db->veri = array("AnaYazi3");
                        $yazi3 = $db->select();
                        foreach ($yazi3 as $key => $value) {
                         ?>
                        <label>Yazı 3</label>
                        <textarea name="yazi3" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
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
                        $db->veri = array("AnaYazi4");
                        $yazi4 = $db->select();
                        foreach ($yazi4 as $key => $value) {
                         ?>
                        <label>Yazı 4</label>
                        <textarea name="yazi4" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
                      </div>
                        <?php 
                      }
                       ?>
                      <input type="submit" name="guncelle4" value="Güncelle" class="btn btn-info">
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