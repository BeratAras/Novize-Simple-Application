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
          <h1 class="page-header">Yorumlar</h1>
          <?php 
          if(get("islem")=="silindi"){
           echo '<div class="alert alert-success"> <strong>Başarılı </strong>
           Yorum Silindi! <a href="#" class="alert-link"></a>
           </div>';
         }elseif(get("islem")=="silinemedi"){
          echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
          Yorum Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
          </div>';
        }
        ?>
                <?php //Tüm Konular çağırılıyor. Konular olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from comments INNER JOIN users ON comments.user_id=users.user_id where comments.confirmed = 0";
                $Yorumlar = $db->select();
                if ($Yorumlar == false) {
                  echo "<p>Kategori Bulunamadı.</p>";
                }else{ //Konular varsa yapılacak işlemler belirleniyor. Kategoriler getiriliyor.
                 ?>


                 <?php 
                 if(isset($_POST["toplusil_onaylanmayan"])){

                  $db->sql = "delete from comments where confirmed = 0";
                  $sil_onaylanmayan = $db->delete();

                  if ($sil_onaylanmayan == true) {
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Onaylanmayan Yorumlar Silindi! <a href="#" class="alert-link"></a>
                    </div>';
                    header("Refresh: 1.0;");
                  }else{
                    header("location:index.php?url=konular&islem=silinemedi");
                  }
                }
                ?>

                <div class="col-lg-6" style="width: 100%">
                 <form method="POST">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Onaylanmayı Bekleyen Yorumlar
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kullanıcı</th>
                              <th>Yorum</th>
                              <th>Tarih</th>
                              <td></td>
                              <td></td>
                              <th> <button type="submit" name="toplusil_onaylanmayan" class="btn btn-danger" onclick="return confirm('Bu İçerikleri Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($Yorumlar as $key => $value) {
                              ?>
                              <tr>
                                <td><?php echo $value->comment_id; ?></td>
                                <td><?php echo $value->username; ?></td>
                                <td><?php echo $value->text; ?></td>
                                <td><?php echo $value->date; ?></td>
                                <td>
                                 <a href="index.php?url=yorum_onay&id=<?=$value->comment_id; ?>" class="btn btn-success" onclick="return confirm('Bu İçeriği Onaylıyorsun. Eminmisin ?');" >Onayla</a>
                               </td>
                               <td>
                                <a href="index.php?url=yorum_guncelle&id=<?=$value->comment_id; ?>" class="btn btn-info">Düzelt</a>
                              </td>
                              <td>
                               <a href="index.php?url=yorum_sil&id=<?=$value->comment_id; ?>" class="btn btn-danger" onclick="return confirm('Bu İçeriği Siliyorsun. Eminmisin ?');" >Sil</a>
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
           </form>
           <?php //Tüm Konular çağırılıyor. Konular olmaması dahilinde "Bulunamadı" mesajı veriliyor.
           $db->sql = " select * from comments INNER JOIN users ON comments.user_id=users.user_id where comments.confirmed = 1";
           $Yorumlar = $db->select();
           if ($Yorumlar == false) {
            echo "<p>Kategori Bulunamadı.</p>";
                }else{ //Konular varsa yapılacak işlemler belirleniyor. Kategoriler getiriliyor.
                 ?>

                 <?php 
                 if(isset($_POST["toplusil_onaylanan"])){

                  $db->sql = "delete from comments where confirmed = 1";
                  $toplusil_onaylanan = $db->delete();

                  if ($toplusil_onaylanan == true) {
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Onaylanan Yorumlar Silindi! <a href="#" class="alert-link"></a>
                    </div>';
                    header("Refresh: 1.0;");
                  }else{
                    header("location:index.php?url=konular&islem=silinemedi");
                  }
                }
                ?>

                 <form method="POST">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Onaylanan Yorumlar
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kullanıcı</th>
                              <th>Yorum</th>
                              <th>Tarih</th>
                              <td></td>
                              <th> <button type="submit" name="toplusil_onaylanan" class="btn btn-danger" onclick="return confirm('Bu İçerikleri Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($Yorumlar as $key => $value) {
                              ?>
                              <tr>
                                <td><?php echo $value->comment_id; ?></td>
                                <td><?php echo $value->username; ?></td>
                                <td><?php echo $value->text; ?></td>
                                <td><?php echo $value->date; ?></td>
                                <td>
                                  <a href="index.php?url=yorum_guncelle&id=<?=$value->comment_id; ?>" class="btn btn-info">Düzelt</a>
                                </td>
                                <td>
                                 <a href="index.php?url=yorum_sil&id=<?=$value->comment_id; ?>" class="btn btn-danger" onclick="return confirm('Bu İçeriği Siliyorsun. Eminmisin ?');" >Sil</a>
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
             </form>




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
  <h1 class="page-header">Yorumlar</h1>
  <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h4> 
  <?php
}
?>