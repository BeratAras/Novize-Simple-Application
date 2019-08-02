
<nav class="navbar navbar-light bg-light" >
  <a class="navbar-brand" href="#" style="font-size: 17px;">
  	<?php 
  	$db->sql = "select text from site_texts where text_type = ?";
  	$db->veri = array("CopYazi");
  	$copyazi = $db->select(1);
  	$cyazi = $copyazi->text;
  	 ?>
    <img  src="public/img/logo_grey.png" width="150" height="30" class="d-inline-block align-top" alt="">
    <label class="mt-1"> <?=$cyazi?></label>
  </a>
</nav>