<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="./">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item active">Danh Sách Truyện</li>
</ol>

<?php  
	$group = $_SESSION['t_group'];

	if($group == 1){
		$res_truyen_user = $myApp->UserGetTruyen($_SESSION['t_user']);
		while ($post_truyen_user = $res_truyen_user->fetch_array(MYSQLI_ASSOC)) {
?>

<ul class="list-group mb-4">
	<li class="list-group-item flex-column align-items-start">
		<h5 class="mb-1">
			<a href="../index.php?q=truyen&id=<?php echo $post_truyen_user['id_truyen']; ?>&t=<?php echo $post_truyen_user['tua_khong_dau']; ?>" target="_blank"><?php echo $post_truyen_user['tua_truyen']; ?></a>
		</h5>
		<small>
			Chương mới nhất: <a href="#">Chương <?php echo $post_truyen_user['so_chuong']; ?></a>
		</small>
		<div class="mt-2">
			<a href="index.php?q=them-chuong&idTruyen=<?php echo $post_truyen_user['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1">Thêm Chương</a>
			<a href="index.php?q=suatruyen&idTruyen=<?php echo $post_truyen_user['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1">Sửa Truyện</a>
			<a href="index.php?q=list-chuong&idTruyen=<?php echo $post_truyen_user['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1 <?php if($post_truyen_user['so_chuong'] == 0) echo 'disabled'; ?>">List Chương</a>
		</div>
	</li>
</ul>

<?php }} ?>

<?php  
	if($group == 0){
		$res_truyen_admin = $myApp->AdminGetTruyen();
		while ($post_truyen_admin = $res_truyen_admin->fetch_array(MYSQLI_ASSOC)) {
?>
<ul id="truyen-<?php echo $post_truyen_admin['id_truyen']; ?>" class="list-group mb-4">
	<li class="list-group-item flex-column align-items-start">
		<h5 class="mb-1">
			<a href="../index.php?q=truyen&id=<?php echo $post_truyen_admin['id_truyen']; ?>&t=<?php echo $post_truyen_admin['tua_khong_dau']; ?>" target="_blank"><?php echo $post_truyen_admin['tua_truyen']; ?></a>
		</h5>
		<small>
			Chương mới nhất: <a href="#">Chương <?php echo $post_truyen_admin['so_chuong']; ?></a>
		</small>
		<div class="mt-2">
			<a href="index.php?q=them-chuong&idTruyen=<?php echo $post_truyen_admin['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1">Thêm Chương</a>
			<a href="index.php?q=suatruyen&idTruyen=<?php echo $post_truyen_admin['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1">Sửa Truyện</a>
			<a href="index.php?q=list-chuong&idTruyen=<?php echo $post_truyen_admin['id_truyen']; ?>" class="btn btn-secondary btn-sm mt-1 <?php if($post_truyen_admin['so_chuong'] == 0) echo 'disabled'; ?>">List Chương</a>
			<button id="xoa-<?php echo $post_truyen_admin['id_truyen']; ?>" class="btn btn-sm btn-danger mt-1">Xóa Truyện</button>
		</div>
		<script type="text/javascript">
		    $(document).ready(function(){
		        $("#xoa-<?php echo $post_truyen_admin['id_truyen']; ?>").click(function(){
		            if(confirm("Bạn có muốn xóa truyện [<?php echo $post_truyen_admin['tua_truyen']; ?>]?")){
		            	$.get("xuly/deleteTruyen.php", {id:<?php echo $post_truyen_admin['id_truyen']; ?>}, function(data){
				        	$("#truyen-<?php echo $post_truyen_admin['id_truyen']; ?>").remove();
				        });
    				} 
		        });
		    });
		</script>
	</li>
</ul>
<?php }} ?>