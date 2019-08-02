<div style="margin-top: 35px;"> </div>


<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan1");
$reklamalan1 = $db->select();
foreach ($reklamalan1 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>

<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan2");
$reklamalan2 = $db->select();
foreach ($reklamalan2 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>

<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan3");
$reklamalan3 = $db->select();
foreach ($reklamalan3 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>


<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan4");
$reklamalan4 = $db->select();
foreach ($reklamalan4 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>


<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan5");
$reklamalan5 = $db->select();
foreach ($reklamalan5 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>


<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan6");
$reklamalan6 = $db->select();
foreach ($reklamalan6 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div>
	<?php
}
?>

<?php 
$db->sql = "select * from site_texts where text_type=?";
$db->veri = array("ReklamAlan7");
$reklamalan7 = $db->select();
foreach ($reklamalan7 as $key => $value) {
	?>
	<div class="card text-center" style="width: 100%; height: 320px; margin-top: 20px;">
		<div class="card-body">
			<label><?=$value->text?></label>
		</div>
	</div> <br>
	<?php
}
?>

