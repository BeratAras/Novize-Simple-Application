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
        <div class="col-6" style="margin-top: 18px;" id="orta">

          <?php
          if (!get("konu")) {
            header("location:index.php");exit();
          } 

          $konu = (string)get("konu");

          $db->sql = "select * from news INNER JOIN users ON news.user_id=users.user_id where text=? and news.confirmed = ? ORDER BY post_id DESC";
          $db->veri = array($konu,1);
          $konu_icerik = $db->select(1);

          if($konu_icerik == false){
            header("location: index.php");exit();
          }

          ?>

          <!-- Kutu Başlangıç -->
           <br>
     <div class="media">
      <?php 
      $id = $konu_icerik->user_id;
      $db->sql = "select * from users where user_id=? and cornfirm_photo=?";
      $db->veri = array($id, 1);
      $goster = $db->select(1);

      $foto = $goster->profile_photo;
      if($foto == false){ ?>
        <a href="index.php?url=user_profil&id=<?=$konu_icerik->user_id; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="public/img/user_defult.png" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
      <?php
      }else{
        ?>
        <a href="index.php?url=user_profil&id=<?=$konu_icerik->user_id; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="<?=$foto?>" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
      <?php } ?>
      <div class="card" style="width: 100%;">
        <div class="card-header">

          <div class="row">
            <div class="col">
            <a href="index.php?url=user_profil&id=<?=$konu_icerik->user_id; ?>"><div class="col text-primary float-left">
             <?= $konu_icerik->username; ?> 
           </div></a>
           </div>
           <?php 
           $user_id = $konu_icerik->user_id;
           $db->sql = "select * from users INNER JOIN countries ON users.country=countries.country where user_id = ?";
           $db->veri = array($user_id);
           $bayrak = $db->select(1);
           $bayrakfoto = $bayrak->country_photo;
           if ($bayrakfoto == true) {
            ?>
            <div class="col">
             <img style="width: 33px; height: 20px; float: left;" src="<?=$bayrakfoto ?>" class=" " alt="..."> 
           &nbsp; Konum: <?= $konu_icerik->country ?> 
           </div>
         <?php } ?>
         <div class="col">
         <?php 
         if (isset($_SESSION["username"])) {
          $user_id = $_SESSION["user_id"];
          $userid = $konu_icerik->user_id;
          $postid = $konu_icerik->post_id;
          if ($user_id == $userid) {
           ?>
           <?php 
           if(isset($_POST['sil'])){
             $db->sql = "delete from news where post_id = ? and user_id=?";
             $db->veri = array($postid, $id);
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
       <?= $konu_icerik->heading ?>
     </div>
     <div class="col-sm">
     </div>
     <div class="col-2 far fa-calendar-alt"> 
       <?= $konu_icerik->date ?>
     </div>
   </div>

 </div>
 <div class="card-body">
  <p class="card-text"><?= $konu_icerik->text ?></p>
</div>
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

                  if(ikinci == 0){var yeni = parseInt(disssayisi)-1; $("#disss"+post_id).html(yeni);}
                }
                if (birinci == "0") {
                  $("#like" + post_id).css("color", "black");
                  $("#dislike" + post_id).css("color", "#2EBDD1");
                  var yeni = parseInt(disssayisi)+1; $("#disss"+icerik).html(yeni);

                  if(ikinci == 0){var yeni = parseInt(likesayisi)-1; $("#likee"+post_id).html(yeni);}
                }

              }
            });

          }

        </script>

        <?php 
        $user_id = $_SESSION['user_id'];
        $post_id = $konu_icerik->post_id;
        $db->sql = "select * from news_like WHERE user_id=? and post_id=?";
        $db->veri = array($user_id,$post_id);
        $sec = $db->select();
        if($sec == true){foreach($sec as $keyy => $valuee){$durum = $valuee->like_result; } }

        ?>
        <!-- /Beğendirme Arka Plan Kodları --->


        <!-- Beğendirme Form Kodları --->
        <div class="card-footer">

          <div class="rating">
            <div class="like grow" <?php if(@$durum == '1'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="like<?=$konu_icerik->post_id;?>" onclick="likdis('<?=$konu_icerik->post_id;?>','1');">
             <i name="likes" class="far fa-thumbs-up fa-1x like" aria-hidden="true"></i> Beğen 
           </div>


           <!-- Thumbs down -->
           <div class="dislike grow" <?php if(@$durum == '0'){echo "style='color:#21A89A'"; @$durum = "boş";} ?> id="dislike<?=$konu_icerik->post_id;?>" onclick="likdis('<?=$konu_icerik->post_id;?>','0');">
             <i name="diss" class="far fa-thumbs-down fa-1x like" aria-hidden="true"></i> Beğenme
           </div>

           <!-- Thumbs down -->
           <div class="comments">
            <i class="far fa-comments fa-1x like" aria-hidden="true"></i><a style="color: black; text-decoration: none;" href="index.php?url=konu&id=<?=$konu_icerik->post_id; ?>">Yorum Yap</a>
          </div>

          <!-- Thumbs down -->
          <div class="dislike grow">
            <i class="far fa-eye fa-1x like" aria-hidden="true"></i> 29 Defa Görüldü
          </div>

        </div>
      </div>
      <!-- /Beğendirme Form Kodları --->

      <div>
       <!-- Beğeni Gösterme Kodları --->
       <hr style="margin-top: 0px; margin-bottom: 4px;">
       <?php 
       $post_id = $konu_icerik->post_id;
       $db->sql = "select COUNT(like_id) as like_toplam from news_like WHERE post_id=? and like_result=?";
       $db->veri = array($post_id, 1);
       $begeni_icerik = $db->select();

       if($begeni_icerik == true){
        foreach ($begeni_icerik as $keyy => $valuee) { $begeni  = $valuee->like_toplam; }
        ?>
        <i class="far fa-thumbs-up fa like"></i>
        <label id="likee<?=$konu_icerik->post_id;?>" style="font-family: Poppins-Bold"> <?=$begeni?> </label>
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
        <label id="disss<?=$konu_icerik->post_id;?>" style="font-family: Poppins-Bold"> <?=$begenmeme?></label>
        <?php 
      }
      ?>
      <!-- Beğeni Gösterme Kodları --->
    </div>
  </div>
</div>
<!-- Kutu Bitiş -->
    <br>

   <!-- Yorumlar Başlangıç --> 
<h4>Yorumlar</h4>
<?php 
$db->sql = "select * from comments INNER JOIN users ON comments.user_id = users.user_id where post_id=? and comments.confirmed = ? order by comment_id DESC";
$db->veri = array($id, 1);
$yorumgoster = $db->select();

if($yorumgoster){
  foreach ($yorumgoster as $key => $value) {
   ?>


   <div class="media bg-white text-dark p-5"> 
    <img style="width: 64px; height: 64px;" src="<?=$konu_icerik->profile_photo?>" class="avatarheader img-thumbnail mr-3" alt="...">
    <div class="media-body">
      <h5 class="mt-0"><?=$value->username?></h5>
      <?=$value->text ?>
    </div>
  </div>
  <br>
  <?php 
}
}
?>
<!-- Yorumlar Bitiş -->

<br>
<!-- Yorumlar Yaz -->

<?php
if(isset($_POST["gonder"])) {
  $writecomments = post("writecomments");
  $user_id = $_SESSION['user_id'];

  if($writecomments == ""){
    echo '<div class="alert alert-danger"><strong>Yorum Yapılamadı!</strong> Lütfen gerekli alanları doldurunuz!</div>';
  }else{

    $db->sql = "insert into comments set user_id=?, post_id=?, text=?, date=?, confirmed=?";
    $db->veri = array($user_id, $id, $writecomments, date("d, m, y"), 0);

    $comments = $db->insert();

    if($comments){
      echo '<div class="alert alert-success"><strong>Yorum Yapıldı! Yorumunuz Onaylandıktan Sonra Gösterilecektir!</strong></div>';
      header("Refresh: 3.0;");
    }else{
      echo '<div class="alert alert-danger"><strong>Yorum Yapılamadı!</strong> Tekrar Deneyin!</div>';

    }
  }
}
?>




<div class="media bg-white text-dark p-5"> 
  <img style="width: 64px; height: 64px;" src="<?=$value->profile_photo?>" class="avatarheader img-thumbnail mr-3" alt="...">

  <div class="media-body">
    <form method="POST">
      <div class="form-group">
        <label>Yorumunu Yaz:</label>
        <textarea name="writecomments" class="form-control" rows="3"></textarea>
      </div>
      <button type="submit" name="gonder" class="btn btn-primary btn-lg btn-block">Gönder</button>
    </form>
  </div>
</div>
<!-- /Yorumlar Yaz -->
</div>
<div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
  <?php require 'inc/icerik_sag.php' ?>
</div>
</div>
</div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>


