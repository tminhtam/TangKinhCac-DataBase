<?php  require_once "../../lib/functions.php"; $myApp = new data();
	$myApp->DeleteTheLoaiTruyen($_GET['id'], $_GET['t']);
	header('location: ../index.php?q=the-loai-truyen');
?>