<?php require 'inc/ust.php' ?> 
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
                if ($_SESSION["user_aut"]=="admin") 
                   { ?>
                       <h1 class="page-header">Ayarlar</h1>
                       <?php
                   }else{
                    ?> 
                    <br>
                    <h1 class="page-header">AYARLAR</h1>
                    <h4>Bu Sayfayı Görmek İçin Yetkiniz Yoktur!</h2> 
                   <?php
                   }
                   ?>
               </div>
           </div>
       </div>
   </div>
</div>


<?php require 'inc/alt.php' ?>