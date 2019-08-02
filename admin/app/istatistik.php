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
       <div class="col-lg-6" style="width: 100%;">
        <br><br>
        <div class="panel panel-default">

          <div class="panel-heading" >
            İstatistikler
          </div>
          <div class="panel-body w-100">
            <div class="table-responsive">
              <table class="table table-hover"> 
                <tbody>
                  <tr>
                    <ul class="list-group w-50" style="width: 50%; float: left;">
                      <li class="list-group-item">SİTE AÇILDIĞI GÜN</li>
                      <li class="list-group-item">SİTE AÇIK KALDIĞI GÜN</li>
                      <li class="list-group-item">TOPLAM ÜYE</li>
                      <li class="list-group-item">ERKEK ÜYE</li>
                      <li class="list-group-item">KADIN ÜYE</li>
                      <li class="list-group-item">ONLINE ÜYE</li>
                      <li class="list-group-item">ONLINE ZİYARETÇİ</li>
                    </ul>
                    <ul class="list-group w-50" style="width: 50%; float: left;">
                      <li class="list-group-item">12.07.2014</li>
                      <li class="list-group-item">1849</li>
                      <?php 
                      $db->sql = "select count(user_id) as uye_toplam from users where confirmed = 1";
                      $uye_topla = $db->select();
                      foreach ($uye_topla as $key => $value) {
                       ?>
                       <li class="list-group-item"><?=$value->uye_toplam ?></li>
                       <?php 
                     }
                     ?>
                     <?php 
                     $db->sql = "select count(user_id) as erkek_uye from users where confirmed = 1 and sex=?";
                     $db->veri = array("Erkek");
                     $erkek_uye_topla = $db->select();
                     foreach ($erkek_uye_topla as $key => $value) {
                       ?>
                       <li class="list-group-item"><?=$value->erkek_uye ?></li>
                       <?php 
                     } 
                     ?>
                     <?php 
                   $db->sql = "select count(user_id) as kadin_uye from users where confirmed = 1 and sex=?";
                   $db->veri = array("Kadın");
                   $erkek_uye_topla = $db->select();
                   foreach ($erkek_uye_topla as $key => $value) {
                     ?>
                     <li class="list-group-item"><?=$value->kadin_uye ?></li>
                       <?php 
                   } 
                   ?>
                     <li class="list-group-item">1</li>
                     <li class="list-group-item">0</li>
                   </ul>
                   

             </table>


             
             
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

