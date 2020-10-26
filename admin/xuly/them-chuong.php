<?php require_once "../../lib/functions.php"; $myApp = new data();
	
	$idTruyen = $_GET["idTruyen"];
	$sochuong = $_POST['chap_num'];
	$title = $_POST['chap_title'];
	$content = $_POST['chap_content'];
	
	$myApp->AddChap($idTruyen, $sochuong, $title, $content);

	if(isset($_POST['luu_them_moi'])){
		$link = "location:../index.php?q=them-chuong&idTruyen=$idTruyen";
		header($link);
	}
	else{
		$link = "location:../index.php?q=list-chuong&idTruyen=$idTruyen";
		header($link);
	}
?>