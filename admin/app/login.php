<!DOCTYPE html>
<html>
<head>
	<title>Admin Giriş</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="<?php echo URL; ?>/public/img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container bg-secondary p-5 font-weight-bold w-25" style="margin-top: 13%;">


		<?php
		if(isset($_POST['girisyap']))
		{
			$kullanici = post("kullanici");
			$sifre = post("sifre");

			if($kullanici=="" or $sifre=="")
			{
				echo '<div class="alert alert-danger"><strong>Giriş Başarısız!</strong> Lütfen gerekli alanları doldurunuz!</div>';
			}else {

				$db->sql = "select * from admin_users where admin_username = ? and admin_pass = ?";
				$db->veri = array($kullanici, $sifre);

				$admin_users = $db->select(1);


				if( $admin_users !=false ) {
					$_SESSION["admin"]=true;
					$_SESSION['admin_username'] = $admin_users->admin_username;
					$_SESSION['firstname'] = $admin_users->firstname;
					$_SESSION['admin_id'] = $admin_users->admin_id;
					$_SESSION['admin_aut'] = $admin_users->admin_authority;
					if(isset($_POST['girisyap']))
					{
						$admin_id = $_SESSION['admin_id'];
						date_default_timezone_set("Europe/Istanbul");
    					setlocale(LC_TIME, 'tr_TR');
						$db->sql = "insert into admin_logs set admin_id=?, action=?, date=?"; //Bu kısımda log alıyoruz giriş yaparken..
						$db->veri = array($admin_id, "login", strftime("%d.%m.%Y Saat: %H:%M"));
						$ekle = $db->insert();

						if(headers_sent())
						{ // headers gönderilmişse javascript ile yönlendir.
							echo("<script>location.href='index.php'</script>");
						}else
						{
							header("Location: index.php");
						}

					}
					exit();
				}else{
				echo '<div class="alert alert-danger"><strong>Giriş Başarısız!</strong> Kullanıcı adı veya şifreniz yanlış!</div>';
			}
		}
	}
	?>





	<form role="form" method="post" class="" action="index.php?url=login">
		<div class="form-group">
			<label for="exampleInputEmail1">Kullanıcı Adı</label>
			<input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adı">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Şifre</label>
			<input type="password" class="form-control" name="sifre" placeholder="Şifreniz">
		</div>
		<div class="form-group form-check">
			<input type="checkbox" class="form-check-input">
			<label class="form-check-label" for="exampleCheck1">Beni Hatırla!</label>
		</div>
		<button type="submit" name="girisyap" class="btn btn-primary">Giriş</button>
	</form>



</div>
</body>
</html>