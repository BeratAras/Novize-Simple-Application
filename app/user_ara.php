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
					if(!get("id")){
						header("location:index.php");exit();
					}

					$id=(string)get("id");

					$db->sql = "select * from users where username";
					$db->veri = array( $id );

					$user = $db->select(1);
					if($user == false){
						header("location: index.php");exit();
					}

					?>


					<?php 
					$db->sql = "select * from users where username=? and confirmed=?";
					$db->veri = array($id,1);
					$userbilgi = $db->select();

					if ($userbilgi == false) {
						echo "Hiç Mesaj Yok";
					}else{
						foreach ($userbilgi as $key => $value) {
							?>

							<div class="card mb-3" style="max-width: 100%; margin-top: 26px;">
								<div class="row no-gutters">
									<div class="col-md-4">
										<?php 
										$db->sql = "select * from users where username=? and cornfirm_photo=?";
										$db->veri = array($id, 1);
										$goster = $db->select(1);
										error_reporting(0);
										$foto = $goster->profile_photo;
										if($foto == false){
											echo "Fotoğraf Onaylanmadı.";
										}else{
											?>
											<img src="<?=$foto?>" class="card-img" alt="...">
											<?php 
										}
										?>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title"><?=$value->username?></h5>
											<p class="card-text"><i class="fas fa-map-marker-alt"></i> <?=$value->country?></p>
											<p class="card-text"><i class="fas fa-birthday-cake"></i> <?=$value->born?></p>
											<p class="card-text"><i class="fas fa-envelope"></i> <?=$value->email?></p>
											<p class="card-text"><i class="fas fa-user-clock"></i> <?=$value->regi_date?></p>
											<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
										</div>
									</div>
								</div>
							</div>

							<?php 
						}
					}
					?>

					<h4>Son Etkinlikler</h4>
					<hr>
					<?php 
					$user_id = $_SESSION['user_id'];
					$db->sql = "select * from news INNER JOIN users ON news.user_id=users.user_id where news.username=? and news.confirmed = ? ORDER BY post_id DESC";
					$db->veri = array($id,1);
					$etkinlik = $db->select();
					if ($etkinlik == false) {
						?>
						<div class="kutu">
							<p>İçerik Bulunamadı.</p>
						</div>
						<?php
					}else{
						foreach ($etkinlik as $key => $value) {
							?>
							<!-- Kutu Başlangıç -->
							<br>
							<div class="media">
								<?php 
								$id = $value->user_id;
								$db->sql = "select * from users where username=? and cornfirm_photo=?";
								$db->veri = array($id, 1);
								$goster = $db->select(1);

								$foto = $goster->profile_photo;
								if($foto == false){ ?>
									<a href="index.php?url=user_profil&id=<?=$value->username; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="public/img/user_defult.png" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
									<?php
								}else{
									?>
									<a href="index.php?url=user_profil&id=<?=$value->username; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="<?=$foto?>" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
								<?php } ?>
								<div class="card" style="width: 100%;">
									<div class="card-header">

										<div class="row">
											<div class="col">
												<a href="index.php?url=user_profil&id=<?=$value->user_id; ?>"><div class="col text-primary float-left">
													<?= $value->username; ?> 
												</div></a>
											</div>
											<?php 
											$user_id = $value->user_id;
											$db->sql = "select * from users INNER JOIN countries ON users.country=countries.country where user_id = ?";
											$db->veri = array($user_id);
											$bayrak = $db->select(1);
											$bayrakfoto = $bayrak->country_photo;
											if ($bayrakfoto == true) {
												?>
												<div class="col">
													<img style="width: 33px; height: 20px; float: left;" src="<?=$bayrakfoto ?>" class=" " alt="..."> 
													&nbsp; Konum: <?= $value->country ?> 
												</div>
											<?php } ?>
											<div class="col">
												<?php 
												if (isset($_SESSION["username"])) {
													$user_id = $_SESSION["user_id"];
													$userid = $value->user_id;
													$postid = $value->post_id;
													if ($user_id == $userid) {
														?>
														<?php 
														if(isset($_POST['sil'])){
															$db->sql = "delete from news where post_id = ?";
															$db->veri = array($postid);
															$gonderisil = $db->delete();

															header("Refresh: 0.0;");
															break;
														}

														?>
														<form method="POST">
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<button name="sil" class="text-right bg-white"><i class="fas fa-trash"></i></button>
															
														</form>
														<?php
													}
												}
												?>
											</div>
										</div>

									</div>
									<div class="card-header">

										<div class="row">
											<div class="col-6">
												<?= $value->heading ?>
											</div>
											<div class="col-sm">
											</div>
											<div class="col-2 far fa-calendar-alt"> 
												<?= $value->date ?>
											</div>
										</div>

									</div>
									<div class="card-body">
										<p class="card-text"><?= $value->text ?></p>
									</div>

									<!-- Beğendirme Arka Plan Kodları --->

									<?php 
									if(isset($_SESSION['user_id'])){ 
										?>
										<script>
											$('div.like, div.dislike').on('click', function() {

												event.preventDefault();
												$('.active').removeClass('active');
												$(this).addClass('active');

												var nesne = $(this);
												var id = nesne.attr("id");
												var veri = "id=" + id + "&durum=1";
											});

											function likdis(post_id, tur) {
												var likesayisi = $("#likee"+post_id).html();
												var disssayisi = $("#disss"+post_id).html();

												$.ajax({
													type: "post",
													url: "ajax/likdis.php",
													data: {
														"post_id": post_id,
														"tur": tur
													},
													success: function(e) {
														var bol = e.split("-");
														var birinci = bol[0];
														var ikinci = bol[1];

														if (birinci == "boş") {
															$("#like" + post_id).css("color", "black");
															$("#dislike" + post_id).css("color", "black");

															if(tur == "1"){var yeni = parseInt(likesayisi)-1; $("#likee"+post_id).html(yeni);}
															if(tur == "0"){var yeni = parseInt(disssayisi)-1; $("#disss"+post_id).html(yeni);} 
														}
														if (birinci == "1") {
															$("#like" + post_id).css("color", "#2EBDD1");
															$("#dislike" + post_id).css("color", "black");  

															var yeni = parseInt(likesayisi)+1; $("#likee"+post_id).html(yeni);

															if(ikinci == 0){var yeni = parseInt(disssayisi-1); $("#disss"+post_id).html(yeni);}
														}
														if (birinci == "0") {
															$("#like" + post_id).css("color", "black");
															$("#dislike" + post_id).css("color", "#2EBDD1");

															var yeni = parseInt(disssayisi)+1; $("#disss"+icerik).html(yeni);

															if(ikinci == 0){var yeni = parseInt(likesayisi-1); $("#likee"+post_id).html(yeni);}
														}

													}
												});

											}

										</script>

										<?php 
										$user_id = $_SESSION['user_id'];
										$post_id = $value->post_id;
										$db->sql = "select * from news_like WHERE user_id=? and post_id=?";
										$db->veri = array($user_id,$post_id);
										$sec = $db->select();
										if($sec == true){foreach($sec as $keyy => $valuee){$durum = $valuee->like_result; } }

										?>
										<!-- /Beğendirme Arka Plan Kodları --->


										<!-- Beğendirme Form Kodları --->
										<div class="card-footer">

											<div class="rating">
												<div class="like grow" <?php if(@$durum == '1'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="like<?=$value->post_id;?>" onclick="likdis('<?=$value->post_id;?>','1');">
													<i name="likes" class="far fa-thumbs-up fa-1x like" aria-hidden="true"></i> Beğen 
												</div>


												<!-- Thumbs down -->
												<div class="dislike grow" <?php if(@$durum == '0'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="dislike<?=$value->post_id;?>" onclick="likdis('<?=$value->post_id;?>','0');">
													<i name="diss" class="far fa-thumbs-down fa-1x like" aria-hidden="true"></i> Beğenme
												</div>

												<!-- Thumbs down -->
												<div class="comments">
													<i class="far fa-comments fa-1x like" aria-hidden="true"></i><a style="color: black; text-decoration: none;" href="index.php?url=konu&id=<?=$value->post_id; ?>">Yorum Yap</a>
												</div>

												<!-- Thumbs down -->
												<div class="dislike grow">
													<i class="far fa-eye fa-1x like" aria-hidden="true"></i> 29 Defa Görüldü
												</div>

											</div>
										</div>
									<?php } ?>
									<!-- /Beğendirme Form Kodları --->

									<div>
										<!-- Beğeni Gösterme Kodları --->
										<hr style="margin-top: 0px; margin-bottom: 4px;">
										<?php 
										$post_id = $value->post_id;
										$db->sql = "select COUNT(like_id) as like_toplam from news_like WHERE post_id=? and like_result=?";
										$db->veri = array($post_id, 1);
										$begeni_icerik = $db->select();

										if($begeni_icerik == true){
											foreach ($begeni_icerik as $keyy => $valuee) { $begeni  = $valuee->like_toplam; }
											?>
											<i class="far fa-thumbs-up fa like"></i>
											<label id="likee<?=$value->post_id;?>" style="font-family: Poppins-Bold"> <?=$begeni?> </label>
											<?php 
										}
										?>

										<?php  
										$db->sql = "select COUNT(like_id) as diss_toplam from news_like WHERE post_id=? and like_result=?";
										$db->veri = array($post_id, 0);
										$diss_icerik = $db->select();

										if($diss_icerik == true){
											foreach ($diss_icerik as $keyy => $valuee) {$begenmeme  = $valuee->diss_toplam;}
											?>
											<i class="far fa-thumbs-down fa like"></i>
											<label id="disss<?=$value->post_id;?>" style="font-family: Poppins-Bold"> <?=$begenmeme?></label>
											<?php 
										}
										?>
										<!-- Beğeni Gösterme Kodları --->
									</div>


								</div>
							</div>
							<?php 
						}

					}

					?>
					<!-- Kutu Bitiş -->


				</div>
				<div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
					<?php require 'inc/icerik_sag.php' ?>
				</div>
			</div>
		</div>
	</main>

	<?php require 'inc/footer.php' ?>

	<?php require 'inc/alt.php' ?>


