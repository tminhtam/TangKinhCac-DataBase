<?php  
	$idTruyen = $_GET["idTruyen"];
	$post_chi_tiet_truyen = $myApp->ChiTietTruyen($idTruyen)->fetch_array(MYSQLI_ASSOC);

?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item"><a href="../index.php?q=truyen&id=<?php echo $idTruyen; ?>&t=<?php echo $post_chi_tiet_truyen['tua_khong_dau']; ?>" target="_blank"><?php echo $myApp->GetTenTruyen($idTruyen); ?></a></li>
	<li class="breadcrumb-item active">Thêm Chương</li>
</ol>

<h1 class="page-header"><?php echo $myApp->GetTenTruyen($idTruyen); ?></h1>

<form method="post" action="xuly/them-chuong.php?idTruyen=<?php echo $idTruyen; ?>" class="mt-4">
	<div id="div_id_chap_num" class="form-group">
		<label for="id_chap_num" class="col-form-label  requiredField">Chương Số</label>
		<div>
			<input type="number" name="chap_num" value="<?php echo $post_chi_tiet_truyen['so_chuong'] + 1; ?>" class="weui_input weui-input form-control" required id="id_chap_num"/>
		</div>
	</div>

	<div id="div_id_chap_title" class="form-group">
		<label for="id_chap_title" class="col-form-label ">Tiêu Đề Chương</label>
		<div> 
			<input type="text" value="" name="chap_title" class="weui_input weui-input form-control" id="id_chap_title" required/>
			<small id="hint_id_chap_title" class="form-text text-muted">Không thêm cụm chương xx vào trong này.</small>
		</div>
	</div>

	<div id="div_id_chap_content" class="form-group">
		<label for="id_chap_content" class="col-form-label ">Nội Dung Chương</label>
		<div class="">
			<textarea style="width: 100%;" name="chap_content" cols="40" rows="18" class="simplemde-box" id="id_chap_content"></textarea>
			<style>.field-chap_content label { float: none; }</style>
		</div>
	</div>

	<div class="text-center">
		<input type="submit" name="luu_them_moi" class="btn btn-success btn-submit" value="Lưu Lại và Thêm Mới">
		<input type="submit" name="luu_thoat" class="btn btn-primary btn-submit" value="Lưu Lại và Thoát">
	</div>
</form>