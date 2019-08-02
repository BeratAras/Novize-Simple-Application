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
        <h1 class="page-header">Cevapla</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">

              <?php //İçerik Getiren PHP Kodları.
                     if (!get("id")) {
                     header("location:index.php");exit();
                     }else{
                        $id = (int)get("id");
                        $db->sql =("select * from messages where msg_id=?");
                        $db->veri = array( $id );
                        $mesajlar = $db->select(1);

                        if ($mesajlar == false) {
                            header("location:index.php");exit();
                        }
                    }

                    $baslik = $mesajlar->type;

                    $soru = $mesajlar->text;

                    $cevap = $mesajlar->result;

            if (pisset()) {
              $yardim_cevap = post("yardim_cevap");
              if ($yardim_cevap == "") {
                echo '<div class="alert alert-danger"> <strong>Uyarı </strong>
                Gerekli Alanları Doldurunuz! <a href="#" class="alert-link">Yeni Ekle</a>.
                </div>';  }
                else{
                  $db->sql = "update messages set result=?, result_confirmed=? where msg_id=?";
                  $db->veri = array($yardim_cevap, 1,$id);
                  $guncelle = $db->update();
                  if($guncelle){
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Mesaj Güncellendi! <a href="#" class="alert-link"></a>
                    </div>';
                    header("location: index.php?url=mesajlar");
                  }else{
                   echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                   Mesaj Bilgileri Güncellenemedi! <a href="#" class="alert-link">Yeniden Dene</a>.
                   </div>';
                 }

               }
             }

             ?>
                      </div>
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            Cevap Güncelle
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <form role="form" method="POST"> <!-- Konu Güncelle-Form Kısmı -->
                                 <div class="form-group">
                                  <p>Yardım Başlık: <?=$baslik ?></p>
                                  <p>Soru: <?=$soru ?></p>
                                  <br>
                                  <label>Cevap:</label>
                                  <textarea  style= "resize:none;" rows="1" type="text" name="yardim_cevap" class="form-control" text=""><?=$cevap ?></textarea> 
                                  <p class="help-block">*Zorunlu Alan</p>
                                </div>
                                          <input type="submit" value="Cevapla" class="btn btn-info">
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