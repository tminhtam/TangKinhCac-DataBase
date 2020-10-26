<?php require_once "../../lib/functions.php"; $myApp = new data();
	$idTruyen = $_GET["idTruyen"];
	$title = $_POST['title_truyen'];
	$title_khong_dau = $myApp->utf8convert($title);
	$urlHinh = $_POST['urlHinh'];
	$tac_gia = $_POST['tac_gia'];
	$trang_thai = $_POST['status'];
	$loaitruyen = $_POST['loaitruyen'];
	$nguon = $_POST['source'];
	$tom_tat = $_POST['summary'];
	$soLuongTL = $myApp->SoLuongTheLoaiTruyen_Admin();

	$myApp->EditStory($idTruyen, $title, $title_khong_dau, $urlHinh, $tac_gia, $loaitruyen, $trang_thai, $tom_tat, $nguon);
	$myApp->DeleteTheLoai_Truyen($idTruyen);

	for ($i = 1; $i <= $soLuongTL; $i++) { 
		if(isset($_POST["ckb"."$i"])){
			$tit = $_POST["ckb"."$i"];
			$myApp->InsertTheLoaiChoTruyen($tit, $idTruyen);
		}
	}


	if(isset($_POST['luu_lai'])){
		$link = "location:../index.php?q=suatruyen&idTruyen=$idTruyen";
		header($link);
	}
	else{
		$link = "location:../index.php";
		header($link);
	}
?>