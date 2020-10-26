<?php  
	$idTruyen = $_GET["idTruyen"];
	$res_chuong = $myApp->GetListChuong_Admin($idTruyen);
?>

<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item"><a href="../index.php?q=truyen&id=<?php echo $idTruyen; ?>&t=<?php echo $myApp->GetTuaKhongDau($idTruyen); ?>" target="_blank"><?php echo $myApp->GetTenTruyen($idTruyen); ?></a></li>
	<li class="breadcrumb-item active">Danh Sách Chương</li>
</ol>
<h1 class="page-header"><?php echo $myApp->GetTenTruyen($idTruyen); ?></h1>

<div class="mt-2"></div>

<?php  
	while ($chuong = $res_chuong->fetch_array(MYSQLI_ASSOC))
	{
?>
<ul id="ul-<?php echo $chuong['id_chuong']; ?>" class="list-group mb-4 mt-2">
	<li class="list-group-item flex-column align-items-start">
		<h5 class="mb-1">
			<a href="../index.php?q=read&id=<?php echo $idTruyen; ?>&t=<?php echo $myApp->GetTuaKhongDau($idTruyen); ?>&idChuong=<?php echo $chuong['id_chuong']; ?>" target="_blank">Chương <?php echo $chuong['so_chuong']; ?>: <?php echo $chuong["tua_chuong"]; ?></a>
		</h5>

		<div class="mt-2">
			<a href="index.php?q=sua-chuong&idTruyen=<?php echo $idTruyen; ?>&chuong=<?php echo $chuong["id_chuong"]; ?>" class="btn btn-secondary btn-sm">Biên Tập</a>
			<button id="id-<?php echo $chuong['id_chuong']; ?>" class="btn btn-sm btn-danger">Xóa Chương</button>
		</div>

		<script type="text/javascript">
		    $(document).ready(function(){
		        $("#id-<?php echo $chuong['id_chuong']; ?>").click(function(){
		            if(confirm("Bạn có muốn xóa [Chương <?php echo $chuong['so_chuong']; ?>]?")){
		            	$.get("xuly/deleteChap.php", {id:<?php echo $chuong['id_chuong']; ?>, truyen:<?php echo $idTruyen; ?>}, function(data){
			        		$("#ul-<?php echo $chuong['id_chuong']; ?>").remove();
			        	});
    				} 
		        });
		    });
		</script>
	</li>
</ul>

<?php } ?>