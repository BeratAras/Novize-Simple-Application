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
        <div class="col-6" style="margin-top: 12px;" id="orta">

          <!---Banner Reklam--->
          <div class="card mt-4">
            <div class="row no-gutters">
              <div class="col">
                <div class="card-body">
                  <br> <br>
                  <?php 
                  $db->sql = "select * from site_texts where text_type=?";
                  $db->veri = array("ReklamBanner");
                  $reklam_banner = $db->select();
                  foreach ($reklam_banner as $key => $value) {
                    ?>
                  <h5 class="card-title text-center"><?=$value->text?></h5><!-- 
                  <p class="card-text">Sitemizin BETA TEST aşamasında olduğunu, ÜYELİK ve TÜM HİZMETLERİN ÜCRETSİZ olduğunu hatırlatarak, sorunlar için hoşgörü bekliyoruz...</p> -->
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!---/Banner Reklam--->
        <br>
        <?php 
        if (isset($_SESSION['username'])) {
         ?>
         <button class="btn btn-primary btn-lg btn-block"><a style="color: white; text-decoration: none;" href="index.php?url=konuolustur">Konu Oluştur</a></button>
         <?php
       }
       ?>
       <!---İlk Mesaj--->
       <?php 
       $db->sql = "select text,date from site_texts where text_type = ?";
       $db->veri = array("AnaYazi1");
       $yazi1 = $db->select();

       foreach ($yazi1 as $key => $value) {
         ?>
         <div class="card mt-4">
          <div class="row no-gutters">
            <div class="col-md-4">
              <br>
              <img src="public/img/man-icon.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <small>Site Açılış Tarihi: 12.07.2014</small>
                <br> <br>
                <p class="card-text"><?=$value->text ?></p>
                <p class="card-text"><small class="text-muted">En Son Güncelleme: <?=$value->date ?></small></p>
              </div>
            </div>
          </div>
        </div>

        <?php 
      }
      ?>
      <!---/İlk Mesaj--->
      <!---İkinci Mesaj--->
      <?php 
      $db->sql = "select text from site_texts where text_type = ?";
      $db->veri = array("AnaYazi2");
      $yazi2 = $db->select();
      foreach ($yazi2 as $key => $value) {
       ?>
       <br>
       <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">No Vize! Yani Sana Vize Yok!</h4>
        <?=$value->text ?>
      </div>

      <?php 
    }
    ?>
    <!---/İkinci Mesaj--->
    <!---Üçüncü Mesaj--->
    <br>

    <style>#more {display: none;}</style>
    <script>
      function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
          dots.style.display = "inline";
          btnText.innerHTML = "Devamını Gör"; 
          moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Görme"; 
          moreText.style.display = "inline";
        }
      }
    </script>

    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">Estonya E-Vatandaşlık</h4>
      <div name="metin">
        <p>Estonia E-Residency, Estonya E-Vatandaşlık hakkında İnternette birçok bilgi var, ama ben bizzat kendim bu işlemi gerçekleştiren biri olarak sizlere daha detaylı bilgiler vereceğim…</p>
        <p>
          SÜREÇ : 15.06.2019 başvuru  ve 100 € kredi kartı ile ödeme, 
        </p>
        <p>
          17.06  Gelen mailde Estonya sınır Polisine teslim edildiği bildirildi...
        </p>
        <p>
          27.06  Onaylandığına ve kartın konsolosluğa gönderileceğine dair mail geldi...     
        </p>
        <p>
          10.07  Ankaradaki Estonya Büyük Elçiliğine gidip alabileceğime dair mail geldi... Adres ( Gölgeli S. No: 12 Gaziosmanpaşa ) 
        </p>
        <span id="dots">...</span><span id="more">
          <p>
            18.07  Ankaraya gidip kartı ve card reader i teslim aldım... ( sadece pazartesi ve perşembe günleri saat 15.00 te teslim ediliyor, gelen son mailde randevu almanıza gerek yoktur yazıyorsa sadece PASAPORTUNUZ ile birlikte gidiyorsunuz, ancak bazı kişilerden randevu alınması isteniyormuş ki buda konsolosluk sitesinden online yapılıyormuş ) 
          </p>
          <p>
            MASRAF : ( Ankara'da yaşamadığımdan kendi masrafımı örnek olarak yazdım )  100 € başvuru, 30 TL fotolar vs ( istedikleri formatta hazırlatmak için - kendinizde yapabilirsiniz ) Uçak gidiş dönüş 700 TL, havalimanı taksi gidiş dönüş 210 TL...  yaklaşık  toplam 1.600 TL...
          </p>
          <p>
            NOTLAR :  kartın geçerlilik tarihi :  5 YIL, kartın üzerinde foto yok...BU KART OTURMA İZNİ,  VATANDAŞ OLMA, VİZESİZ SEYAHAT GİBİ HAKLAR VERMİYOR...Ama Avrupada bir şirket kurmanıza, Pay Pal kullanmanıza imkan veriyor...Kartın bir aidatı falan yok...Şirket kurma masrafları ayrıca ödeniyor.. Bu aşamayla uğraşıyorum, tamamlayınca ŞİRKET KURMA, PAY PAL ve BANKA HESAPLARI ile ilgili bilgileride vereceğim...
          </p>
          <p>
            Konsolosluk önünde 30-35 kişilik bir kuyruk oluşuyor.. 14.30 da gidip kapıdaki güvenliğe kayıt yaptırırsanız o sıraya göre 3 er kişilk gruplar halinde alıyorlar, çok küçük bir odada cam arkasında Estonyalı memur var, parmak izi alıyor ad soyad ve imza attırıp kartın olduğu kutuyu teslim ediyor.. Soru sormuyor..Memur Türkçe bilmiyor, ihtiyaç halinde içeriden Türkçe bilen bayanı çağırıyor ama gerek olmaz..Yalnız bu kısa işlem yaklaşık kişi başı 10 dakika sürüyor çünkü parmak izi okuyucuları biraz arızalı!
          </p>
          <p>
            devam edecek ...
          </p>
          <p>
            ADMİN
          </p>

        </div>
        <button onclick="myFunction()" id="myBtn" class="btn btn-primary btn-sm">Devamını Gör</button>
      </div>
      <!---/Üçüncü Mesaj--->

      <!---Dördüncü Mesaj--->
      <?php 
      $db->sql = "select text from site_texts where text_type = ?";
      $db->veri = array("AnaYazi3");
      $yazi2 = $db->select();
      foreach ($yazi2 as $key => $value) {
       ?>
       <!---İkinci Mesaj--->
       <br>
       <div class="alert alert-success" role="alert">
        <?=$value->text ?>
      </div>

      <?php 
    }
    ?>
    <!---/Dördüncü Mesaj--->

    <!---Beşinci Mesaj--->

    <?php 
    $db->sql = "select text from site_texts where text_type = ?";
    $db->veri = array("AnaYazi4");
    $yazi2 = $db->select();
    foreach ($yazi2 as $key => $value) {
     ?>
     <!---İkinci Mesaj--->
     <br>
     <div class="alert alert-primary" role="alert">
      <?=$value->text ?>
    </div>

    <?php 
  }
  ?>
  <!---/Beşinci Mesaj--->

  <?php  error_reporting(0); ?>

  <!---/Üçüncü Mesaj--->
  <?php 
  $db->sql = "select * from news INNER JOIN users ON news.user_id=users.user_id where post_id and news.confirmed = ? ORDER BY post_id DESC limit 0,25";
  $db->veri = array(1);
  $anasayfa_icerik = $db->select();
  if ($anasayfa_icerik == false) {
    ?>
    <div class="kutu">
      <p>İçerik Bulunamadı.</p>
    </div>
    <?php
  }else{
    foreach ($anasayfa_icerik as $key => $value) {
     ?>
     <!-- Kutu Başlangıç -->
     <br>
     <div class="media">
      <?php 
      $id = $value->user_id;
      $db->sql = "select * from users where user_id=? and cornfirm_photo=?";
      $db->veri = array($id, 1);
      $goster = $db->select(1);

      $foto = $goster->profile_photo;
      if($foto == false){ ?>
        <a href="index.php?url=user_profil&id=<?=$value->user_id; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="public/img/user_defult.png" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
      <?php
      }else{
        ?>
        <a href="index.php?url=user_profil&id=<?=$value->user_id; ?>"> <img style="width: 64px; height: 64px; background-color: #E9EBEE;" src="<?=$foto?>" class="avatarheader img-thumbnail mr-3" alt="..."></a> 
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

<ul class="list-group list-group-horizontal-xl mt-3" style="margin-left: 91px;">
  <li class="list-group-item"><a href="index.php?url=anasayfa">1</a></li>
  <li class="list-group-item"><a href="index.php?url=say2">2</a></li>
  <li class="list-group-item"><a href="index.php?url=say3">3</a></li>
  <li class="list-group-item"><a href="index.php?url=say3">4</a></li>
</ul>
<br>
</div>
<div class="col" id="sag"> <!--- Sağdaki hot bölümünü çekiyor. --->
  <?php require 'inc/icerik_sag.php' ?>
</div>
</div>
</div>
</main>

<?php require 'inc/footer.php' ?>

<?php require 'inc/alt.php' ?>


