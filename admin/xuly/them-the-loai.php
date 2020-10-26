<?php  require_once "../../lib/functions.php"; $myApp = new data();
	$myApp->ThemTheLoaiTruyen($_POST['TenTL']);
	header('location: ../index.php?q=the-loai-truyen');
?>