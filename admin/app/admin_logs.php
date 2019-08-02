<?php require 'inc/ust.php'  ?> 
<div id="wrapper">


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <?php 
   require 'inc/ust_nav.php';
   require 'inc/sol_nav.php';
   ?>
 </nav>

 <?php 
 if(isset($_POST["toplusil"])){

  $db->sql = "delete from admin_logs";
  $sil = $db->delete();

  if ($sil == true) {
    echo '<div class="alert alert-success"> <strong>Başarılı </strong>
    Tüm Admin Logları Silindi! <a href="#" class="alert-link"></a>
    </div>';
    header("Refresh: 1.0;");
  }else{
    header("location:index.php?url=admin_logs&islem=silinemedi");
  }
}
?>


<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
       <div class="col-lg-6" style="width: 100%;">
        <br><br>
        <div class="panel panel-default w-100">

          <div class="panel-heading w-100" >
            Admin Logs
          </div>
          <div class="panel-body w-100">
            <div class="table-responsive">
              <form method="POST">
              <table class="table table-hover"> 
                <thead>
                  <tr>
                    <th>Admin Ad</th>
                    <th>Eylem</th>
                    <th>Tarih</th>
                    <th> <button type="submit" name="toplusil" class="btn btn-danger" onclick="return confirm('Tüm Admin Logları Siliyorsun. Eminmisin ?');" >Toplu Sil</button></th>
                  </tr>
                </thead>
                <?php 
                $db->sql = "select * from admin_logs INNER JOIN admin_users ON admin_logs.admin_id = admin_users.admin_id";
                $admin_log = $db->select();
                if ($admin_log == false) {
                  echo "Admin Hareketi Yok.";
                }else{
                  foreach ($admin_log as $key => $value) {
                   ?>
                   <tbody>
                    <tr>

                      <td><?=$value->admin_username ?></td>
                      <td><?=$value->action ?></td>
                      <td><?=$value->date ?></td>
                      <?php 
                    } 
                  }
                  ?>
                </tr>
              </tbody>
            </table>
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


<?php require 'inc/alt.php' ?>

