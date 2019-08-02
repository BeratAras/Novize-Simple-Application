<?php takip(); ?>
<?php require 'inc/ust.php' ?>
<?php require 'inc/header.php' ?>
<main>
	<div class="container-fluid" style="background-color: #E9EBEE;">
		<div class="container" id="icerik">
			<div class="row">
				<div class="col" id="sol">
					<?php include 'inc/icerik_sol.php' ?>
				</div>
				<div class="col-6" style="margin-top: 70px;" id="orta">
					<?php 
					if (!get("id")) {
						header("location:index.php");exit();
					}else{
						$id = (int)get("id");
						$db->sql = "select * from icerik where icerik_kategori_id=? ORDER BY icerik_id DESC";
						$db->veri = array($id);
						$kategori_icerikler = $db->select();
						if ($kategori_icerikler==false) { ?>
							<div class="kutu"><p>İçerik Bulunamadı.</p></div>
							<?php
						}else{
							foreach ($kategori_icerikler as $key => $value) {
							?>
             <!-- Kutu Başlangıç -->
             <br>
             <div style=" 
             padding: 1rem;
             border-radius: 20px;
             position: relative;
             background: linear-gradient( gray, white);
             padding: 1px; ">
             <div style="background-color: #E2E2E2;  border-radius: 20px 20px 0px 0px; padding: 20px 20px 5px 20px;  "> <?= $value->icerik_kod; ?> </div>
           </div>
           <!-- Kutu Bitiş -->
           <?php
					if(isset($_SESSION['uye_kullanici'])){ //Eğer kullanıcı giriş yapmışsa yorum yapmasına izin verilir.
           $idd=$value->icerik_id;
           $db->sql = "select * from yorumlar INNER JOIN uyeler on uyeler.uye_id = yorumlar.uye_id where icerik_id = '".$idd."' ORDER BY yorum_id ASC";
           $yorum_icerik = $db->select();
           ?>
           <!--- Yorumlar Başlangıç --->
           <div style="background-color: #FFFFFF; padding: 10px 10px 10px 10px; border-radius: 0px 0px 20px 20px;  color: black;">
            <form role="form" method="POST" class="form-group">

              <input name="icerikid" type="hidden" value="<?=$value->icerik_id;?>" />


             <script src="<?php echo URL; ?>/public/js/jquery-3.4.0.min.js"></script>


              <!-- Beğendirme Arka Plan Kodları --->
              <script>
                $('div.like, div.dislike').on('click', function() {

                  event.preventDefault();
                  $('.active').removeClass('active');
                  $(this).addClass('active');

                  var nesne = $(this);
                  var id = nesne.attr("id");
                  var veri = "id=" + id + "&durum=1";
                });

                function likdis(icerik, tur) {
                  var likesayisi = $("#likee"+icerik).html();
                  var disssayisi = $("#disss"+icerik).html();
                  
                  $.ajax({
                    type: "post",
                    url: "ajax/likdis.php",
                    data: {
                      "icerik": icerik,
                      "tur": tur
                    },
                    success: function(e) {
                        var bol = e.split("-");
                        var birinci = bol[0];
                        var ikinci = bol[1];
                      
                      if (birinci == "boş") {
                        $("#like" + icerik).css("color", "black");
                        $("#dislike" + icerik).css("color", "black");

                        if(tur == "1"){var yeni = parseInt(likesayisi)-1; $("#likee"+icerik).html(yeni);}
                        if(tur == "0"){var yeni = parseInt(disssayisi)-1; $("#disss"+icerik).html(yeni);} 
                      }
                      if (birinci == "1") {
                        $("#like" + icerik).css("color", "#2EBDD1");
                        $("#dislike" + icerik).css("color", "black");  
                        var yeni = parseInt(likesayisi)+1; $("#likee"+icerik).html(yeni);
                       
                        if(ikinci == 0){var yeni = parseInt(disssayisi)-1; $("#disss"+icerik).html(yeni);}
                      }
                      if (birinci == "0") {
                        $("#like" + icerik).css("color", "black");
                        $("#dislike" + icerik).css("color", "#2EBDD1");
                        var yeni = parseInt(disssayisi+1); $("#disss"+icerik).html(yeni);
                        if(ikinci == 0){var yeni = parseInt(likesayisi)-1; $("#likee"+icerik).html(yeni);}
                      }
                    }
                  });

                }

              </script>
              
              <?php 
              $uye_id = $_SESSION['uye_id'];
              $icerik = $value->icerik_id;
              $db->sql = "select * from icerik_begeniler WHERE uye_id=? and icerik_id=?";
              $db->veri = array($uye_id,$icerik);
              $sec = $db->select();
              if($sec == true){foreach($sec as $keyy => $valuee){$durum = $valuee->begeni_durum; } }

              ?>
             <!-- /Beğendirme Arka Plan Kodları --->


              <!-- Beğendirme Form Kodları --->
              <hr>
              <div class="rating">
                <div class="like grow" <?php if(@$durum == '1'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="like<?=$value->icerik_id;?>" onclick="likdis('<?=$value->icerik_id;?>','1');">
                 <i name="likes" class="far fa-thumbs-up fa-2x like" aria-hidden="true"></i> Beğen
               </div>


               <!-- Thumbs down -->
               <div class="dislike grow" <?php if(@$durum == '0'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="dislike<?=$value->icerik_id;?>" onclick="likdis('<?=$value->icerik_id;?>','0');">
                <i name="diss" class="far fa-thumbs-down fa-2x like" aria-hidden="true"></i> Beğenme
              </div>
              <!-- Thumbs down -->
              <div class="dislike grow">
                <i class="far fa-comments fa-2x like" aria-hidden="true"></i> Yorum Yap
              </div>

            </div>
            <hr>
            <!-- /Beğendirme Form Kodları --->
 
          <?php 
          $icerik = $value->icerik_id;
          $db->sql = "select COUNT(id) as like_toplam from icerik_begeniler WHERE icerik_id=? and begeni_durum=?";
          $db->veri = array($icerik, 1);
          $begeni_icerik = $db->select();

          if($begeni_icerik == true){
            foreach ($begeni_icerik as $keyy => $valuee) { $begeni  = $valuee->like_toplam; }
              ?>
              <div class="fa fa-thumbs-up fa-1x like">
                <label id="likee<?=$value->icerik_id;?>" style="font-family: Poppins-Bold"> <?=$begeni?> </label>
              </div>
              <?php 
            
          }
          ?>

          <?php  
          $db->sql = "select COUNT(id) as diss_toplam from icerik_begeniler WHERE icerik_id=? and begeni_durum=?";
          $db->veri = array($icerik, 0);
          $diss_icerik = $db->select();

          if($diss_icerik == true){
            foreach ($diss_icerik as $keyy => $valuee) {$begenmeme  = $valuee->diss_toplam;}
             ?>
             <div class="fa fa-thumbs-down fa-1x like">
              <label id="disss<?=$value->icerik_id;?>" style="font-family: Poppins-Bold"> <?=$begenmeme?></label>
            </div>
            <?php 
          
        }
        ?>
        <hr>  


                                <!-- Ajax Yorum Arka Plan Kodları (Sayfa yenilenmeden yorum yaptırmak için) --->
                                <script>
                                /*function gonder(){
                                    $uye_kullanici = $_SESSION['uye_kullanici'];
                                    var uye_kullanici = $("input[name=kulad]").val();
                                    uye_kullanici = jQuery.trim(uye_kullanici);

                                    var yorum = $("input[name=yorum]").val();
                                    yorum = jQuery.trim(yorum);

                                    var zaman = $("input[name=zaman]").val();
                                    zaman = jQuery.trim(zaman);

                                    if (yorum == "") {
                                        alert("Boş Bırakmayın!")
                                    }
                                  }*/
                                </script>  
                                <!-- /Ajax Yorum Arka Plan Kodları --->

                                <?php
                                if($yorum_icerik == false){ ?> <!-- Eğer hiç yorum yoksa "ilk yorumu sen yaz" yazsın -->
                                  <label style="color: #019B8C;">İlk Yorumu Sen Yap!</label>
                                  <br>
                                  <br>
                                  <?php
                                }else{
                                 foreach ($yorum_icerik as $key => $value) { //Yapılan yorumlar çekiliyor.
                                   ?>
                                   <ul style="list-style-type: none;  overflow: hidden; word-wrap: break-word; width: 499px; ">
                                    <li>
                                      <div style="margin-left: 25px;">
                                        <img src="public/upload/<?=$value->uye_foto;?>" alt="Anna Ford" class="avatarheader float-left img-responsive">
                                        <label class="mt-2" name="kulad" style="float: left; margin-right: 5px;"><?=$value->uye_kullanici;?>:</label>
                                        <div style=" padding-right: 10px; padding-left: 10px; word-wrap: break-word; background-color: #F2F3F5; border-radius: 20px;">
                                          <label class="mt-2 text-break" name="gonderilenyorum"> <?=$yor=$value->yorum;?></label>
                                        </div>
                                        <label class="mt-2" name="zaman" style="float: right; color: #019E8F; font-size: 10px; margin-right: 5px;"><?=$value->zaman;?></label>
                                      </div>
                                    </li>
                                  </ul>
                                  <?php
                                }
                              }
                              ?>
                             <!--- Yorumlar Yaptırma --->
                              Yorum Yap
                              <textarea name="yorum" class="form-control" placeholder="Düşüncelerin Neler ?" style='width:520px'></textarea>
                              <input type="submit" name="gonder" class="btn btn-dark" style='margin-top:10px;'></input>
                            </form>
                          </div>
                          <!--- /Yorumlar Yaptırma  --->
                          <br>
                          <?php

								}else{ //Burada giriş !yapmamışsa! "yorum yapmak için giriş yap" yazısı çıkarılır.
									?>
                  <div style="background-color: #FFFFFF; padding: 20px 20px 20px 20px; border-radius: 0px 0px 20px 20px;  color: black;">
                    <label>Yorum Yapabilmek için <a href="index.php?url=login">Giriş Yap!</a></label>
                  </div>
                  <br>
                  <?php
                }

              }

							foreach ($kategori_icerikler as $key => $value) {
								if (pisset()) {
									$uye_idd = $_SESSION['uye_id'];
									$icerik_idd = post("icrerikid");
									$yorum = post("yorum");
									$zaman = post("zaman");
									date_default_timezone_set("Europe/Istanbul");
									setlocale(LC_TIME, 'tr_TR');
									if ($yorum == "") {
										echo '<div class="alert alert-danger"> <strong>Uyarı </strong>
										Yorum Alanı Boş! <a href="#" class="alert-link"></a>.
										</div>';
									}
									else{
										$db->sql = "insert into yorumlar set uye_id=?, icerik_id=?, yorum=?, zaman=?";
										$db->veri = array($uye_idd, $icerik_idd, $yorum, strftime("%H:%M %A"));
										$ekle = $db->insert();
										header("Location: index.php?url=anasayfa");
									}
									break;
								}
							}
						}
					}
				?>
				<h1></h1>
				<?php 

				?>
			</div>
			<div class="col" id="sag">
				<?php require 'inc/icerik_sag.php' ?> 
			</div>
		</div>
	</div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>

