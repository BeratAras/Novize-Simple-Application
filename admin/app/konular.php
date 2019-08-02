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
          <h1 class="page-header">Konular</h1>
          <?php 
          if(get("islem")=="silindi"){
           echo '<div class="alert alert-success"> <strong>Başarılı </strong>
           Konu Silindi! <a href="#" class="alert-link"></a>
           </div>';
         }elseif(get("islem")=="silinemedi"){
          echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
          Konu Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
          </div>';
        }
        ?>
                <?php //Tüm Konular çağırılıyor. Konular olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from news INNER JOIN users ON news.user_id=users.user_id where news.confirmed = 0";
                $Konular = $db->select();
                if ($Konular == false) {
                  echo "<p>Onaylanmayan Konu Bulunamadı.</p>";
                }else{ //Konular varsa yapılacak işlemler belirleniyor. Kategoriler getiriliyor.
                 ?>

                 <?php 
                 if(isset($_POST["toplusil_onaylanmayan"])){

                  $db->sql = "delete from news where confirmed = 0";
                  $sil_onaylanmayan = $db->delete();

                  if ($sil_onaylanmayan == true) {
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Onaylanan Konular Silindi! <a href="#" class="alert-link"></a>
                    </div>';
                    header("Refresh: 1.0;");
                  }else{
                    header("location:index.php?url=konular&islem=silinemedi");
                  }
                }
                ?>
                <div class="col-lg-6" style="width: 100%">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Onaylanmayı Bekleyen Konular
                    </div>
                    <form method="POST">
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>ÜYE ADI</th>
                              <th>E-POSTA</th>
                              <th>KONU BAŞLIK</th>
                              <th> <button type="submit" name="toplusil_onaylanmayan" class="btn btn-danger" onclick="return confirm('Bu İçerikleri Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($Konular as $key => $value) {
                              ?>
                              <tr>
                                <td><?php echo $value->post_id; ?></td>
                                <td><?php echo $value->username; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->heading; ?></td>
                                <td>
                                 <a href="index.php?url=konu_onay&id=<?=$value->post_id; ?>" class="btn btn-success" onclick="return confirm('Bu İçeriği Onaylıyorsun. Eminmisin ?');" >Onayla</a>
                               </td>
                              <td>
                               <a href="index.php?url=konu_sil&id=<?=$value->post_id; ?>" class="btn btn-danger" onclick="return confirm('Bu İçeriği Siliyorsun. Eminmisin ?');" >Sil</a>
                             </td>
                           </tr>
                           <?php 
                         }
                         ?>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 </form>
                 <?php 
               }
               ?>
             </div>

             <?php 
             if(isset($_POST["toplusil"])){

              $db->sql = "delete from news where confirmed = 1";
              $sil = $db->delete();

              if ($sil == true) {
                echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                Onaylanan Konular Silindi! <a href="#" class="alert-link"></a>
                </div>';
              }else{
                header("location:index.php?url=konular&islem=silinemedi");
              }

            }
            ?>
            <?php //Tüm Konular çağırılıyor. Konular olmaması dahilinde "Bulunamadı" mesajı veriliyor.
            $db->sql = " select * from news INNER JOIN users ON news.user_id=users.user_id where news.confirmed = 1";
            $Konular = $db->select();
            if ($Konular == false) {
              echo "<p>Konu Bulunamadı.</p>";
                }else{ //Konular varsa yapılacak işlemler belirleniyor. Kategoriler getiriliyor.
                 ?>
                 <form method="POST">
                   <div class="panel panel-default">
                    <div class="panel-heading">
                      Onaylanan Konular
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>ÜYE ADI</th>
                              <th>E-POSTA</th>
                              <th>KONU BAŞLIK</th>
                              <th> <button href="" type="submit" name="toplusil" class="btn btn-danger" onclick="return confirm('Bu İçerikleri Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($Konular as $key => $value) {
                              ?>
                              <tr>
                                <td><?php echo $value->post_id; ?></td>
                                <td><?php echo $value->username; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->heading; ?></td>
                                <td>
                                 <a href="index.php?url=konu_sil&id=<?=$value->post_id; ?>" class="btn btn-danger" onclick="return confirm('Bu İçeriği Siliyorsun. Eminmisin ?');" >Sil</a>
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
  <h1 class="page-header">Konular</h1>
  <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h4> 
  <?php
}
?>


