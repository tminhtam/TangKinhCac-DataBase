<?php  require_once "../../lib/functions.php"; $myApp = new data();
	$myApp->UpdateTheLoaiTruyen($_POST['ID'], $_POST['TenTL'], $_POST['TenCu']);
	header('location: ../index.php?q=the-loai-truyen');
?>