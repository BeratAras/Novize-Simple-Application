<head>
  <meta charset="utf8mb4_bin"/>
</head>
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
        <h1 class="page-header">Üyelere E-Posta Gönder</h1>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">

           
 <?php 
/* function mailgonder($kimden,$kime,$konu,$mesaj){*/
         /*require "class.phpmailer.php"; */
        /*require_once("../PHPMailer/PHPMailer.php");
        require_once("../PHPMailer/SMTP.php"); 
        require_once("../PHPMailer/Exception.php");
         $mail = new PHPMailer\PHPMailer\PHPMailer(); 
         $mail->IsSMTP();
         $mail->From     = $kimden; 
         $mail->Sender   = $kime;
         $mail->FromName = "Novize";*/  //göndericinin adı
        /* $mail->Host     = "mail.novize.info"; //smtp nin kullanacağı mail sunucusu
         $mail->SMTPAuth = true;  
         $mail->Username = "info@novize.info";  //mail hesabı kullanıcı adı
         $mail->Password = "kyuxd7wuw3";  //mail hesabına ait şifre
         $mail->Port = "465"; //smtp nin kullanacağı giden mail sunucu portu
         $mail->CharSet = "utf-8";
         $mail->WordWrap = 50;  
         $mail->IsHTML(true);
         $mail->Subject  = $konu; 
       
         $body = $mesaj;*/
     
      /*   $textBody = strip_tags($mesaj);
         $mail->Body = $body;  
         $mail->AltBody = $textBody;  
         $mail->AddAddress($kimden);  //mailin gönderileceği mail adresi
         $mail->AddAddress($kime); */ //maillerin gideceği ek adresler (varsa)
         /*$mail->SMTPDebug =2;*/
         /*return ($mail->Send())?true:false;      
         $mail->ClearAddresses();  
         $mail->ClearAttachments();*/
/*}*/
 ?>

<?php 
/*$kime = post("kime");
$konu = post("konu");
$mesaj = post("mesaj");
mailgonder("info@novize.info","".$kime."","".$konu."","".$mesaj.""); */
?>

</div>
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
       E-Posta Gönder
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">

          <form  role="form" method="POST" id="contact_form"> <!-- Yazı Post-Form Kısmı -->
           <div class="form-group">
            <label>Kime:</label>
            <select class="form-control">
              <?php 
              $db->sql = "select email from users";
              $mail = $db->select();
              if($mail){
                foreach ($mail as $key => $value) {
                 ?>
                 <option name="kime"><?=$value->email ?></option>
                 <?php  
               }
             }
             ?>
           </select>
           <br>
           <label>Konu</label>
            <input class="form-control" type="text" name="konu">
         </div>
         <div class="form-group ckeditor">
          <label>E-Posta İçerik:</label>
          <textarea name="mesaj" rows="10" class="form-control ckeditor"></textarea>
        </div>
        <input type="submit" name="submitcontact" value="Güncelle" class="btn btn-info">
      </form>


    </div>
  </div>
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