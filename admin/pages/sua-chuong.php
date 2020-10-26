<?php  
	$idTruyen = $_GET["idTruyen"];
	$idChuong = $_GET["chuong"];
	$post_chuong = $myApp->GetChuong($idChuong)->fetch_array(MYSQLI_ASSOC);

?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="./">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item"><a href="../index.php?q=truyen&id=<?php echo $idTruyen; ?>&t=<?php echo $myApp->GetTuaKhongDau($idTruyen); ?>" target="_blank"><?php echo $myApp->GetTenTruyen($idTruyen); ?></a></li>
	<li class="breadcrumb-item"><a href="index.php?q=list-chuong&idTruyen=<?php echo $idTruyen; ?>" target="_blank">List Chương </a></li>
	<li class="breadcrumb-item active">Sửa Chương</li>
</ol>

<h1 class="page-header"><?php echo $myApp->GetTenTruyen($idTruyen); ?></h1>

<form method="post" action="xuly/edit-chuong.php?idTruyen=<?php echo $idTruyen; ?>&chuong=<?php echo $post_chuong['id_chuong']; ?>" class="mt-4">
	<div id="div_id_chap_num" class="form-group">
		<label for="id_chap_num" class="col-form-label  requiredField">Chương Số</label>
		<div>
			<input type="number" name="chap_num" value="<?php echo $post_chuong['so_chuong']; ?>" class="weui_input weui-input form-control" required id="id_chap_num" />
		</div>
	</div>

	<div id="div_id_chap_title" class="form-group">
		<label for="id_chap_title" class="col-form-label ">Tiêu Đề Chương</label>
		<div> 
			<input type="text" value="<?php echo $post_chuong['tua_chuong']; ?>" name="chap_title" class="weui_input weui-input form-control" id="id_chap_title" />
			<small id="hint_id_chap_title" class="form-text text-muted">Thêm cụm chương xx vào trong này.</small>
		</div>
	</div>

	<div id="div_id_chap_content" class="form-group">
		<label for="id_chap_content" class="col-form-label ">Nội Dung Chương</label>
		<div>
			<textarea style="width: 100%;" name="chap_content" cols="40" rows="20" class=" simplemde-box" id="id_chap_content"><?php echo str_replace("<br/>", "\n", $post_chuong['noi_dung']); ?></textarea>
			<style>.field-chap_content label { float: none; }</style>
		</div>
	</div>

	<input type="submit" name="luu_lai" class="btn btn-success btn-submit" value="Lưu Lại Và Biên Tập">
	<input type="submit" name="luu_thoat" class="btn btn-primary btn-submit" value="Lưu Lại Và Thoát">
</form>