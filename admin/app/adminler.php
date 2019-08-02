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
            <div class="col-lg-12" style="width: 100%;">
              <br>
               <!-- Login İşlemleri Başlangıç -->
          <?php

            if(pisset())
            {
                $kullanici = post("kullanici");
                $sifre = post("sifre");
                $ad = post("ad");
                $soyad = post("soyad");
                $rol = post("rol");

                if($kullanici=="" or $sifre=="" or $ad=="" or $soyad=="" or $rol=="")
                {
                    echo '<div class="alert alert-danger"><strong>Kayıt Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
                  }
                else{
                    $db->sql = "insert into admin_users set admin_username=?, admin_pass=?, firstname=?, lastname=?, admin_authority=?";
                    $db->veri = array($kullanici, $sifre, $ad, $soyad, $rol);
                    $ekle = $db->insert();
                    if($ekle){
                      echo '<div class="alert alert-success"><strong>Admin Eklendi!</strong></div>';
                  }else{
                    echo '<div class="alert alert-danger"><strong>Admin Eklenemedi!</strong> İstenmeyen Bir Hata Oldu!</div>';
                }
            }

        }

        ?>
          <!-- /Login İşlemleri Başlangıç -->
          <!--- Kayıt Ol Form --->
         <form  enctype="multipart/form-data" class="login-form" method="POST"  style="margin-top:0%;"> 

          <div class="form-group" style="margin-top: 40px;">
            <label>Kullanıcı Ad:</label>
            <input type="text" name="kullanici" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre:</label>
            <input type="password" name="sifre" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Adı:</label>
            <input type="text" name="ad" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Soyadı:</label>
            <input type="text" name="soyad" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Rol:</label>
            <select class="form-control" name="rol">
              <option>admin</option>
              <option>yönetici</option>
              <option>editör</option>
            </select>
          </div>

          <button type="submit" name="kayitol" value="kayitol" class="btn btn-primary text-center">Kayıt Et</button>
        </form>
        <!--- /Kayıt Ol Form --->
                <?php 
                if ($_SESSION["admin_aut"]=="admin") 
                { 
                    ?>
                    <h1 class="page-header">Adminler</h1>
                    <?php 
                    if(get("islem")=="silindi"){
                       echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                       Üye Silindi! <a href="#" class="alert-link"></a>
                       </div>';
                      header("Refresh: 1.0;");
                   }elseif(get("islem")=="silinemedi"){
                    echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                    Üye Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
                    </div>';
                }
                ?>
                <?php //Tüm Adminler çağırılıyor. Kadın Üyeler olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from admin_users";
                $Uyeler = $db->select();
                if ($Uyeler == false) {
                    echo "<p>Üye Admin Yok.</p>";
                }else{ //Admin varsa yapılacak işlemler belirleniyor. 
                   ?>
                   <div class="col-lg-6" style="width: 100%;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adminler
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Adı</th>
                                            <th>Soyadı</th>
                                            <th>Rolü</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($Uyeler as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->admin_id; ?></td>
                                                <td><?php echo $value->admin_username; ?></td>
                                                <td><?php echo $value->firstname; ?></td>
                                                <td><?php echo $value->lastname; ?></td>
                                                <td><?php echo $value->admin_authority; ?></td> 
                                                <td>  
                                               <a href="index.php?url=adminler_sil&id=<?=$value->user_id; ?>" class="btn btn-danger" onclick="return confirm('Bu Admini Siliyorsun. Eminmisin ?');" >Sil</a>
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