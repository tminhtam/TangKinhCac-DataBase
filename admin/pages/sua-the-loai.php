<?php  
	$id = $_GET['id'];
	$res = $myApp->GetTenTheLoaiTruyen($id);
	$post_my_Tl = $res->fetch_array();
?>
<div class="container-fluid">
	<form method="post" action="xuly/sua-the-loai.php">
		<input type="text" class="form-control" name="ID" id="ID" value="<?php echo $post_my_Tl['idTL']; ?>" hidden>

		<input type="text" class="form-control" name="TenCu" id="TenCu" value="<?php echo $post_my_Tl['ten']; ?>" hidden>
		
		<div class="form-group">
			<label for="TenTL">Tên Thể Loại</label>
			<input type="text" class="form-control" name="TenTL" id="TenTL" maxlength="50" value="<?php echo $post_my_Tl['ten']; ?>" required>
			<small class="form-text text-muted"><i class="fal fa-engine-warning"></i> Bạn không được bỏ trống tên thể loại.</small>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary"><i class="fal fa-share-square"></i> Cập nhật</button>
		</div>
	</form>
</div>