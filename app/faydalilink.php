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
          $db->sql = "select text from site_texts where text_type = ?";
          $db->veri = array("Linkler");
          $tuyo = $db->select();
          foreach ($tuyo as $key => $value) {
                ?>

                <div class="card text-center mt-4">
                  <div class="card-header">              
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Faydalı Linkler</h5>
                    <p class="card-text"><?=$value->text;?></p>
                  </div>
                  <div class="card-footer text-muted">
              
                  </div>
                </div>

                <?php 
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


