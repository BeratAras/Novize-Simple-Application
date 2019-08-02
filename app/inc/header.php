<!---Nav Başlangıç-->
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="ust">
		<a class="navbar-brand" href="index.php">
			
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<?php 
                $db->sql = "select * from site_settings where set_type=?";
                $db->veri = array("logo");
                $logo_getir = $db->select();
                foreach ($logo_getir as $key => $value) {
               ?>
		<a href="index.php"><img  style="margin-left: 15px;" src="<?=$value->set_text?>" width="200" height="40"  alt=""></a>	
         <!---Arama Kutusu--->
         <?php } ?>
		<?php 
         if(isset($_POST["arama"])){
          $text = post("ara");
          $db->sql = "select * FROM news WHERE text = '".$text."'";
          $ara_icerik = $db->select(); 
          strip_tags($ara_icerik);
          if($ara_icerik){
            foreach ($ara_icerik as $key => $value) { 
              $aranacak = $value->text;
              if ($text == $aranacak) {
                header("Location: index.php?url=konuara&konu=$value->text");
              }else{
                echo "aradığınız içerik bulunamadı.";
              }break;
            } 
          }
        }
        ?>
		 <form  class="form-inline my-2 my-lg-0" style="margin-left: 20.5%; width: 40%;" method="POST">
          <input name="ara" class="form-control mr-sm-2 w-75" type="search" placeholder="Arama Yap" aria-label="Search">
          <button name="arama" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Ara</button>
        </form>
        <!---/Arama Kutusu--->
	
			<ul class="nav justify-content-end navbar-nav ml-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
			<?php
			session_start();
			ob_start();
			if(!isset($_SESSION['username'])){ 
				?> 
			<?php
		}else{
			 //Üyenin Fotoğrafını Getirtmek İçin
			$idd = $_SESSION['user_id'];
			$db->sql = "select * from users where users.user_id = '".$idd."'";
			$uye_foto_icerik = $db->select(); 

			if($uye_foto_icerik==true){
				foreach ($uye_foto_icerik as $key => $value) {
					?>

				<!--- Giriş Yaptıktan Sonra Baş --->
				<ul class="nav justify-content-end navbar-nav mt-2 mt-lg-0 pr-3"> <!--- Sol Taraf --->
					<label><a class="nav-link mt-2" href="index.php?url=logout">Çıkış Yap</a></label>
				</li>
			</ul> 
				<!--- Giriş Yaptıktan Sonra Son --->
				<?php
					}
				}
			}
			?>



			<ul>
			</ul>
		</div>
	</nav>
</header>
<!---Nav Bitiş-->