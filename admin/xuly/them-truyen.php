<?php require_once "../../lib/functions.php"; $myApp = new data();
	$user = $_REQUEST["user"];
	$title = $_REQUEST["title_truyen"];
	$title_khong_dau = $myApp->utf8convert($_REQUEST["title_truyen"]);
	$urlHinh = $_REQUEST["urlHinh"];
	$tac_gia = $_REQUEST["tac_gia"];
	$loai_truyen = $_REQUEST["loai_truyen"];
	$trang_thai = $_REQUEST["status"];
	$tom_tat = $_REQUEST["summary"];
	$nguon = $_REQUEST["source"];

	$soLuongTL = $myApp->SoLuongTheLoaiTruyen_Admin();

	$myApp->UserCreateStory($title, $title_khong_dau, $urlHinh, $tom_tat, $nguon, $tac_gia, $loai_truyen, $trang_thai, $user);
	$idTruyen = $myApp->GetID_TRUYEN($title, $title_khong_dau, $tac_gia);

	for ($i = 1; $i <= $soLuongTL; $i++) { 
		if(isset($_POST["ckb"."$i"])){
			$tit = $_POST["ckb"."$i"];
			$myApp->InsertTheLoaiChoTruyen($tit, $idTruyen);
		}
	}

	$link = "location:../index.php";
	header($link);	
?>