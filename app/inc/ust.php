<!DOCTYPE html>
<html>
<head>
	<?php 
		$db->sql = "select * from site_settings where set_type=?";
		$db->veri = array("title");
		$title = $db->select();
		foreach ($title as $key => $value) {
		?>
		<title><?=$value->set_text?></title>
		<?php } ?>

		<meta charset="utf-8">

		<?php 
		$db->sql = "select * from site_settings where set_type=?";
		$db->veri = array("description");
		$description = $db->select();
		foreach ($description as $key => $value) {
		?>
		<meta name="description" content="<?=$value->set_text?>">
		<?php } ?>

		<?php 
		$db->sql = "select * from site_settings where set_type=?";
		$db->veri = array("keywords");
		$keywords = $db->select();
		foreach ($keywords as $key => $value) {
		?>
		<meta name="keywords" content="<?=$value->set_text?>">
		<?php } ?>
		<meta name="author" content="Berat Aras">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="<?php echo URL; ?>/public/css/bootstrap.min.css">
		<script src="<?php echo URL; ?>/public/js/jquery-3.4.0.min.js"></script> 
		<script src="<?php echo URL;?>/public/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo URL; ?>/public/css/homepagestyle.css">
		<link rel="stylesheet" href="<?php echo URL; ?>/public/css/button.css">
		<link rel="stylesheet" href="<?php echo URL; ?>/public/css/anasayfaicerik_sol.css">
		<script type="text/javascript" href="<?php echo URL; ?>/public/js/button.js"></script>
		<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
		<link rel="icon" type="image/png" href="<?php echo URL; ?>/public/img/favicon.ico">

		<!-- Logoları Getiriyor -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<!-- Logoları Getiriyor -->


	</head>
	<body>






<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->