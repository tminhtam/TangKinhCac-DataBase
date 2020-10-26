<?php 
	include('../../lib/dbCon.php');

	if(isset($_GET['q']))
	{
		$idTruyen = $_GET['q'];
		settype($idTruyen, "int");
	}
	else
	{
		$link = "location:../index.php?q=danhsachtruyen";
		header($link);
	}

	$qr = "DELETE FROM `chapter` WHERE idTruyen = $idTruyen";
	$result = mysqli_query($con, $qr);
	
	$qr = "DELETE FROM `truyen` WHERE idTruyen = $idTruyen";
	$result = mysqli_query($con, $qr);

	$link = "location:../index.php?q=danhsachtruyen";
	header($link);
?>

