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
         $user_id = $_SESSION['user_id'];
         $db->sql = "select * from messages where user_id=? and result_confirmed=?";
         $db->veri = array($user_id,1);
         $mesajcek = $db->select();

         if ($mesajcek == false) {
           echo "Hiç Mesaj Yok";
         }else{
          foreach ($mesajcek as $key => $value) {
            ?>
            <div class="media bg-white mt-5 p-5">
              <div class="media-body">
                <h5 class="mt-0"><?=$value->type ?></h5>
                <?=$value->text ?>

                <div class="media mt-3">
                  <a class="mr-3" href="#">
                  </a>
                  <div class="media-body">
                    <h5 class="mt-0">Admin Cevap:</h5>
                    <?=$value->result ?>
                  </div>
                </div>
              </div>
            </div>

            <?php 
          }
        }
        ?>

      </div>
      <div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
        <?php require 'inc/icerik_sag.php' ?>
      </div>
    </div>
  </div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>



