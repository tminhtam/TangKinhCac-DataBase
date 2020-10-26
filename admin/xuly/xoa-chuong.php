<?php 
	include('../../lib/dbCon.php');

	if(isset($_GET["idTruyen"]))
	{
		$idTruyen = $_GET["idTruyen"];
		settype($idTruyen, "int");

		if(isset($_GET["chuong"]))
		{
			$chuong = $_GET["chuong"];
			settype($chuong, "int");
		}
	}

	if(isset($_GET["q"]))
	{
		$qr = "DELETE FROM `chapter` WHERE idTruyen = $idTruyen and num_chapter = $chuong";
		mysqli_query($con, $qr);

		$chuong--;

		$qr2 = "UPDATE `truyen` SET `num_chapter`= $chuong WHERE idTruyen = $idTruyen";
		mysqli_query($con, $qr2);

		$link = "location:../index.php?q=list-chuong&idTruyen=$idTruyen";
		header($link);
	}
	
?>

