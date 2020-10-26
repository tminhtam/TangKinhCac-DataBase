<?php  require_once "../../lib/functions.php"; $myApp = new data();
	$idTruyen = $_REQUEST['id'];
	$myApp->DeleteTruyen($idTruyen);
?>