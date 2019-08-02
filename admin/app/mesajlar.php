<?php require 'inc/ust.php'  ?> 
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

        <?php 
        if ($_SESSION["admin_aut"]=="admin") 
        { 
          ?>
          <h1 class="page-header">Mesajlar</h1>
          <?php 
          if(get("islem")=="silindi"){
           echo '<div class="alert alert-success"> <strong>Başarılı </strong>
           Mesaj Silindi! <a href="#" class="alert-link"></a>
           </div>';
         }elseif(get("islem")=="silinemedi"){
          echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
          Mesaj Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
          </div>';
        }
        ?>
                <?php //Cevapsız Mesajlar çağırılıyor. Cevapsız mesaj olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from messages where result_confirmed = ?";
                $db->veri = array(0);
                $mesaj = $db->select();
                if ($mesaj == false) {
                  echo "<p>Cevap Bekleyen Yardım Talebi Yok.</p>";
                }else{ //Mesaj varsa yapılacak işlemler belirleniyor. 
                 ?>


                 <?php

                 if(isset($_POST['gonder'])){
                   $toplu = post("toplu_mesaj"); 

                   if($toplu == ""){
                    echo '<div class="alert alert-danger"><strong>Lütfen Gerekli Alanları Doldurunuz!</strong></div>';
                  }
                  else{
                   $db->sql = "insert into all_message set text=?";
                   $db->veri = array($toplu);
                   $ekle = $db->insert();
                   if($ekle){
                     echo '<div class="alert alert-success"><strong>Toplu Mesaj Gönderimi Başarılı!</strong> Yeniden Gönder!</div>';
                   }else{
                    echo '<div class="alert alert-danger"><strong>Toplu Mesaj Gönderiminiz Başarısız!</strong> İstenmeyen Bir Hata Oldu!</div>';
                  }
                }
              }
              ?>

              <div class="col-lg-14">

               <div class="panel panel-default">
                <div class="panel-heading">
                  Toplu Mesaj Gönder
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <form role="form" method="POST"> <!-- Yazı Post-Form Kısmı -->
                        <div class="form-group">
                          <label>Mesajın:</label>
                          <textarea name="toplu_mesaj" rows="10" class="form-control ckeditor"></textarea>
                        </div>
                        <input type="submit" name="gonder" value="Gönder" class="btn btn-info">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  Cevap Bekleyen Yardım Talepleri
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kullanıcı Adı</th>
                          <th>Yardım Tipi</th>
                          <th>Yardım Talebi</th>
                          <th>Cevap</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach ($mesaj as $key => $value) {
                          ?>
                          <tr>
                            <td><?php echo $value->sender; ?></td>
                            <td><?php echo $value->type; ?></td>
                            <td><?php echo $value->text; ?></td>
                            <td><?php echo $value->result; ?></td>
                            <td>
                             <a href="index.php?url=mesaj_cevap&id=<?=$value->msg_id; ?>" class="btn btn-success" onclick="return confirm('Bu Mesajı Cevaplıyorsun. Eminmisin ?');" >Cevapla</a>
                           </td>
                           <td>
                             <a href="index.php?url=mesaj_sil&id=<?=$value->msg_id; ?>" class="btn btn-danger" onclick="return confirm('Bu Mesajı Siliyorsun. Eminmisin ?');" >Sil</a>
                           </td>
                         </tr>
                         <?php 
                       }
                       ?>
                     </tbody>
                   </table>
                 </div>
               </div>
               <?php 
             }
             ?>
           </div>


           <?php //Cevap verilen mesajlar çağırılıyor. Cevap verilen mesaj olmaması dahilinde "Bulunamadı" mesajı veriliyor.
           $db->sql = " select * from messages where result_confirmed = ?";
           $db->veri = array(1);
           $mesaj = $db->select();
           if ($mesaj == false) {
            echo "<p>Cevap Verilen Yardım Talebi Yok.</p>";
                }else{ //Mesaj varsa yapılacak işlemler belirleniyor. 
                 ?>
                 <div class="col-lg-14">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Cevap Verilen Yardım Talepleri
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Kullanıcı Adı</th>
                              <th>Yardım Tipi</th>
                              <th>Yardım Talebi</th>
                              <th>Cevap</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($mesaj as $key => $value) {
                              ?>
                              <tr>
                                <td><?php echo $value->sender; ?></td>
                                <td><?php echo $value->type; ?></td>
                                <td><?php echo $value->text; ?></td>
                                <td><?php echo $value->result; ?></td>
                                <td>
                                 <a href="index.php?url=mesaj_guncelle&id=<?=$value->msg_id; ?>" class="btn btn-success" onclick="return confirm('Bu Mesajı Güncelliyorsun. Eminmisin ?');" >Cevabı Güncelle</a>
                               </td>
                               <td>
                                 <a href="index.php?url=mesaj_sil&id=<?=$value->msg_id; ?>" class="btn btn-danger" onclick="return confirm('Bu Mesajı Siliyorsun. Eminmisin ?');" >Sil</a>
                               </td>
                             </tr>
                             <?php 
                           }
                           ?>
                         </tbody>
                       </table>
                     </div>
                   </div>
                   <?php 
                 }
                 ?>
               </div>



             </div>
           </div>
         </div>
       </div>
     </div>
   </div>


   <?php require 'inc/alt.php' ?>

   <?php
 }else{
  ?> 
  <h1 class="page-header">Mesajlar</h1>
  <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h4> 
  <?php
}
?>