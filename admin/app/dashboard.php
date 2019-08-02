<?php require_once 'inc/ust.php' ?> 
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
      <?php 
      $admin_id = $_SESSION['admin_id'];
      $db->sql = "select * from admin_logs where admin_id = ? and action=? order by log_id DESC LIMIT 1";
      $db->veri = array($admin_id, "logout");
      $giristarih = $db->select(1);
      if($giristarih){
      $tarih = $giristarih->date;
      } 
      ?>
      <div class="col-lg-12">
        <h1 class="page-header">Hoşgeldin <?php echo $_SESSION['firstname'];?> 
        <?php 
        if($giristarih == true){
         ?>
        <small><?=$tarih?></small></h1> 
       <?php 
     } 
       ?>
      </div>
    </div>


    <div class="container" style="width: 40%;">
      <ul class="list-group">
        <?php 
        $db->sql = "select count(user_id) as photo from users where users.cornfirm_photo = 0";
        $uyefoto = $db->select();
        foreach ($uyefoto as $key => $value) {
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="index.php?url=uye_foto">ONAY BEKLEYEN ÜYE FOTOĞRAFI</a>
            <span class="badge badge-primary badge-pill"><?= $value->photo; ?></span>
          </li>
        <?php } ?>
          <?php 
          $db->sql = "select count(post_id) as postid from news where confirmed = 0";
          $konutopla = $db->select();
          foreach ($konutopla as $key => $value) {
           ?>
           <li class="list-group-item d-flex justify-content-between align-items-center">
             <a href="index.php?url=konular">ONAY BEKLEYEN KONU</a>
             <span class="badge badge-primary badge-pill"><?= $value->postid; ?></span>
           </li>
           <?php
         }
         ?>

         <?php 
         $db->sql = "select count(comment_id) as commentid from comments where confirmed = 0";
         $yorumtopla = $db->select();
         foreach ($yorumtopla as $key => $value) {
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
           <a href="index.php?url=yorumlar">ONAY BEKLEYEN YORUM</a>
           <span class="badge badge-primary badge-pill"><?= $value->commentid; ?></span>
         </li>
         <?php 
       }
       ?>

       <?php 
       $db->sql = "select count(user_id) as userid from users where confirmed = 0";
       $uyeliktopla = $db->select();
       foreach ($uyeliktopla as $key => $value) {
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="index.php?url=tum_uyeler">ONAY BEKLEYEN ÜYELİK</a>
          <span class="badge badge-primary badge-pill"><?= $value->userid; ?></span>
        </li>
        <?php 
      }
      ?>

      <?php 
      $db->sql = "select count(msg_id) as msgid from messages where result = ?";
      $db->veri = array("");
      $mesajtopla = $db->select();
      foreach ($mesajtopla as $key => $value) {
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="index.php?url=mesajlar">CEVAP BEKLEYEN YARDIM TALEPLERİ</a>
          <span class="badge badge-primary badge-pill"><?=$value->msgid ?></span>
        </li>
        <?php 
      }
      ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
       <a href="index.php?url=mail_gonder">GÖNDERİLMEYİ BEKLEYEN CORN EMAİLLER</a>
       <span class="badge badge-primary badge-pill">0</span>
     </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">
      <a href="#">REKLAMLAR (Yapım Aşamasında)</a>
      <span class="badge badge-primary badge-pill">0</span>
    </li>
  </ul>
</div>

</div>
</div>

</div>


<?php require 'inc/alt.php' ?>