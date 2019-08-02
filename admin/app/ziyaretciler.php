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
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-lg-12">

                <?php 
                if ($_SESSION["admin_aut"]=="admin") 
                { 
                    ?>
                    <h1 class="page-header">Ziyaretçiler</h1>
                    <?php 
                    if(get("islem")=="silindi"){
                       echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                       Ziyaretçi Silindi! <a href="#" class="alert-link"></a>
                       </div>';
                   }elseif(get("islem")=="silinemedi"){
                    echo '<div class="alert alert-warning"> <strong>Başarısız </strong>
                    Ziyaretçi Silinemedi! <a href="#" class="alert-link">Yeniden Dene</a>
                    </div>';
                }
                ?>

                 <?php 
                 if(isset($_POST["toplusil"])){

                  $db->sql = "delete from visitors";
                  $sil = $db->delete();

                  if ($sil == true) {
                    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
                    Tüm Ziyaretçiler Silindi! <a href="#" class="alert-link"></a>
                    </div>';
                    header("Refresh: 1.0;");
                  }else{
                    header("location:index.php?url=konular&islem=silinemedi");
                  }
                }
                ?>


                <?php //Tüm Üyeler çağırılıyor. Üyeler olmaması dahilinde "Bulunamadı" mesajı veriliyor.
                $db->sql = " select * from visitors group by visitors_id DESC";
                $Ziyaretci = $db->select();
                if ($Ziyaretci == false) {
                    echo "<p>Ziyaretçi Yok</p>";
                }else{ //Üyeler varsa yapılacak işlemler belirleniyor. 
                   ?> 
                   <div class="col-lg-6" style="width: 100%;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Ziyaretçiler
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form method="POST">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Geldiği Link</th>
                                            <th>Tarayıcı</th>
                                            <th>Dil</th>
                                            <th>Tarih</th>
                                            <th> <button type="submit" name="toplusil" class="btn btn-danger" onclick="return confirm('Tüm Ziyaretçileri Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($Ziyaretci as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->geldigi; ?></td>
                                                <td><?php echo $value->tarayici; ?></td>
                                                <td><?php echo $value->dil; ?></td>
                                                <td><?php echo $value->date; ?></td>
                                            <td>
                                            <a href="index.php?url=ziyaretci_sil&id=<?=$value->visitors_id;?>" class="btn btn-danger">Sil</a>
                                           </td>
                                       </tr>
                                       <?php 
                                   }
                                   ?>
                               </tbody>
                           </table>
                           </form>
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
    <h1 class="page-header">Ziyaretçiler</h1>
    <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h4> 
    <?php
}
?>