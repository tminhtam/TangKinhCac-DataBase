<?php  require_once "../lib/functions.php";
	$myApp = new data();

	$idTruyen = $_REQUEST['id'];
	$TongChuong = $_REQUEST['tong'];
	$page = $_REQUEST['page'];
	$title = $_REQUEST['t'];

	$res_chuong_choi = $myApp->AjaxChuong($idTruyen, $TongChuong, $page);

	while ($post_25_chuong = $res_chuong_choi->fetch_array(MYSQLI_ASSOC)) {
?>
<li>
	<a href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $title; ?>/<?php echo $post_25_chuong['id_chuong']; ?>">Chương <?php echo $post_25_chuong['so_chuong']; ?>: <?php echo $post_25_chuong['tua_chuong']; ?></a>
</li>
<?php } ?>