<?php require_once "../../lib/functions.php"; $myApp = new data();
	$idTruyen = $_GET["idTruyen"];
	$idChuong = $_GET["chuong"];

	$sochuong = $_POST['chap_num'];
	$title = $_POST['chap_title'];
	$content = $_POST['chap_content'];

	$myApp->Save_Chuong($idChuong, $sochuong, $title, $content);

	if(isset($_POST['luu_lai'])){
		$link = "location:../index.php?q=sua-chuong&idTruyen=$idTruyen&chuong=$idChuong";
		header($link);
	}
	else{
		$link = "location:../index.php?q=list-chuong&idTruyen=$idTruyen";
		header($link);
	}
?>

