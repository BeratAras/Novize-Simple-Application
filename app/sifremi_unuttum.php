<?php takip(); ?>
<?php require 'inc/ust.php' ?>
<?php require 'inc/header.php' ?>
<main>
  <div class="container-fluid" style="background-color: #E9EBEE;">
    <div class="container-fluid" id="icerik">
      <div class="row">
        <div class="col" id="sol">
          <!---Sol Menü--->
          <?php require 'inc/icerik_sol.php' ?>
          <!---/Sol Menü--->
        </div>
         
        <div class="col-6" style="margin-top: 10px;" id="orta">

          <?php 
         if(isset($_POST['gonder'])){
            echo '<div class="alert alert-success"><strong>Gönderim Başarılı! E-posta adresinizi kontrol ediniz!</strong></div>';
          }
           ?>

         <form  enctype="multipart/form-data" class="login-form" method="POST"  style="margin-top:0%;"> <!--- Kayıt Ol Form --->
          <div class="form-group mt-4">
            <label for="exampleInputPassword1">E-Posta Adresi:</label>
            <input type="mail" name="eposta" class="form-control">
          </div>
          <button type="submit" name="gonder" value="Gönder" class="btn btn-primary text-center">Gönder</button>

      </div>




      <div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
        <?php require 'inc/icerik_sag.php' ?>
      </div>
    </div>
  </div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>


