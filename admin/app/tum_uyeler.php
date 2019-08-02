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
                    <h1 class="page-header">Tüm Üyeler</h1>
                    <?php 
                    if(get("islem")=="silindi"){
                       echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                       Üye Silindi! <a href="#" class="alert-link"></a>
                       </div>';
                   }elseif(get("islem")=="silinemedi"){
                    echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                    Üye Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
                    </div>';
                }
                ?>
                <?php //Tüm Üyeler çağırılıyor. Üyeler olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from users where users.confirmed = 0";
                $Uyeler = $db->select();
                if ($Uyeler == false) {
                    echo "<p>Onaylanmayı Bekleyen Üye Yok.</p>";
                }else{ //Üyeler varsa yapılacak işlemler belirleniyor. 
                   ?>
                   <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Onaylanmayı Bekleyen Üyeler
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>E-Posta</th>
                                            <th>Doğum Tarihi</th>
                                            <th>Cinsiyeti</th>
                                            <th>Ülkesi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($Uyeler as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->user_id; ?></td>
                                                <td><?php echo $value->username; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->born; ?></td>
                                                <td><?php echo $value->sex; ?></td>
                                                <td><?php echo $value->country; ?></td>
                                                <td>
                                                   <a href="index.php?url=uye_onay&id=<?=$value->user_id; ?>" class="btn btn-success" onclick="return confirm('Bu Üyeyi Onaylıyorsun. Eminmisin ?');" >Onayla</a>
                                               </td>
                                            <td>
                                               <a href="index.php?url=uye_sil&id=<?=$value->user_id; ?>" class="btn btn-danger" onclick="return confirm('Bu Üyeyi Siliyorsun. Eminmisin ?');" >Sil</a>
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

            <?php //Tüm Üyeler çağırılıyor. Üyeler olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from users where users.confirmed = 1";
                $Uyeler = $db->select();
                if ($Uyeler == false) {
                    echo "<p>Onaylanan Üye Yok.</p>";
                }else{ //Üyeler varsa yapılacak işlemler belirleniyor.
                   ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Onaylanan Üyeler
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>E-Posta</th>
                                            <th>Doğum Tarihi</th>
                                            <th>Cinsiyeti</th>
                                            <th>Ülkesi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($Uyeler as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->user_id; ?></td>
                                                <td><?php echo $value->username; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->born; ?></td>
                                                <td><?php echo $value->sex; ?></td>
                                                <td><?php echo $value->country; ?></td>
                                               <!--  <td>
                                                   <a href="index.php?url=uye_onay&id=<?=$value->user_id; ?>" class="btn btn-success" onclick="return confirm('Bu İçeriği Onaylıyorsun. Eminmisin ?');" >Onayla</a>
                                               </td> -->
                                            <td>
                                               <a href="index.php?url=uye_sil&id=<?=$value->user_id; ?>" class="btn btn-danger" onclick="return confirm('Bu Üyeyi Siliyorsun. Eminmisin ?');" >Sil</a>
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
    <h1 class="page-header">Yorumlar</h1>
    <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h4> 
    <?php
}
?>