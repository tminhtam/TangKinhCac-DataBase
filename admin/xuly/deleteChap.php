<?php  require_once "../../lib/functions.php"; $myApp = new data();

	$idChuong = $_REQUEST['id'];
	$idTruyen = $_REQUEST['truyen'];
	$myApp->DeleteChapter($idChuong);
	$myApp->UpdateChaperKhiXoa($idTruyen);
?>