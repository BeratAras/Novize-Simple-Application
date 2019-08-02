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
        <h1 class="page-header">Reklam Banner</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">

              <?php
            if (isset($_POST["guncelle"])) {
              $reklam_banner = post("reklam_banner");
   
                  $db->sql = "update site_texts set text=?, date=? where text_type=?";
                  $db->veri = array($reklam_banner, date("d, m, y"), "ReklamBanner");
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
                Reklam Bilgileri
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">


                    <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                      <div class="form-group">
                        <?php 
                        $db->sql = "select text from site_texts where text_type = ?";
                        $db->veri = array("ReklamBanner");
                        $reklam_banner = $db->select();
                        foreach ($reklam_banner as $key => $value) {
                        ?>
                        <label>Reklam Banner</label>
                        <textarea name="reklam_banner" rows="10" class="form-control ckeditor"><?=$value->text;?></textarea>
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