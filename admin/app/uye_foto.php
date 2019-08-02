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
                    <h1 class="page-header">Fotoğraflar</h1>
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
                $db->sql = " select * from users where users.confirmed = 1 and users.cornfirm_photo = 0 order by user_id DESC";
                $photo_onay_wait = $db->select();
                if ($photo_onay_wait == false) {
                    echo "<p>Onaylanmayı Bekleyen Fotoğraf Yok.</p>";
                }else{ //Üyeler varsa yapılacak işlemler belirleniyor. 
                   ?>
                   <div class="col-lg-6" style="width: 100%;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Onaylanmayı Bekleyen Fotoğraflar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Fotoğrafı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($photo_onay_wait as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->user_id; ?></td>
                                                <td><?php echo $value->username; ?></td>
                                               <td><img src="../<?=$value->profile_photo?>" class="img-responsive card-img-top" alt="..."></td>

                                                <td>
                                                   <a href="index.php?url=uye_foto_onay&id=<?=$value->user_id; ?>" class="btn btn-success" onclick="return confirm('Bu Fotoğrafı Onaylıyorsun. Eminmisin ?');" >Onayla</a>
                                               </td>
                                          <!--   <td>
                                               <a href="index.php?url=uyefoto_sil&id=<?=$value->user_id; ?>" class="btn btn-danger" onclick="return confirm('Bu İçeriği Siliyorsun. Eminmisin ?');" >Sil</a>
                                           </td> -->
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