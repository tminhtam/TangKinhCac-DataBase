<?php  
	$idTruyen = $_GET["idTruyen"];	
	$post_truyen = $myApp->ChiTietTruyen($idTruyen)->fetch_array(MYSQLI_ASSOC);
	$res_tlll = $myApp->GetTheLoai($idTruyen);

	$arr = array(); $numaaa = 0;
	while ( $ty_arr = $res_tlll->fetch_array(MYSQLI_ASSOC) ) {
		$arr[$numaaa] = $ty_arr['ten_tl'];
		$numaaa++;
	}
?>

<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="./">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item"><a href="../index.php?q=truyen&id=<?php echo $idTruyen; ?>&t=<?php echo $post_truyen['tua_khong_dau']; ?>" target="_blank"><?php echo $post_truyen['tua_truyen']; ?></a></li>
	<li class="breadcrumb-item active">Sửa Truyện</li>
</ol>
<h1 class="page-header"><?php echo $post_truyen['tua_truyen']; ?></h1>

<form method="post" action="xuly/edit-truyen.php?idTruyen=<?php echo $idTruyen; ?>" enctype="multipart/form-data" class="mt-4" id="id_form">
	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label requiredField">Tựa Truyện</label>
		<div>
			<input type="text" name="title_truyen" value="<?php echo $post_truyen['tua_truyen']; ?>" class="weui_input weui_input weui-input form-control" autofocus="" placeholder="Tên truyện" maxlength="50" required id="id_title" /> 
		</div> 
	</div> 

	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label  requiredField">Url Hình</label>
		<div>
			<input type="text" name="urlHinh" value="<?php echo $post_truyen['thumbnail']; ?>" class="weui_input weui_input weui-input form-control" autofocus="" placeholder="Tác giả của truyện" maxlength="3000" required id="id_title" /> 
		</div> 
	</div> 

	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label  requiredField">Tác Giả</label>
		<div>
			<input type="text" name="tac_gia" value="<?php echo $post_truyen['tac_gia']; ?>" class="weui_input weui_input weui-input form-control" autofocus="" placeholder="Tác giả của truyện" maxlength="200" required id="id_title" /> 
		</div> 
	</div> 

	<div id="div_id_status" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Thể Loại<span class="asteriskField">*</span> </label> 
		<div class="row">
			<?php  
				$res_the_loai = $myApp->GetTheLoaiTruyen_Admin();
				$ck = 1;
				while ($post_tl = $res_the_loai->fetch_array(MYSQLI_ASSOC)) {
			?>
			<div class="col-2">
				<div class="custom-control custom-checkbox mr-sm-2 mt-2">
			        
			        <input type="checkbox" class="custom-control-input" <?php foreach ($arr as $arr_con){ 
				        if($post_tl['ten'] == $arr_con)
				        	echo "checked";} ?> name="ckb<?php echo $ck; ?>" value="<?php echo $post_tl['ten']; ?>" id="<?php echo $post_tl['ten']; ?>">

			        <label class="custom-control-label" for="<?php echo $post_tl['ten']; ?>"><?php echo $post_tl['ten']; ?></label>
		      	</div>
			</div>
			<?php $ck++;} ?>
		</div>
	</div> 

	<div id="div_id_status" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Loại Truyện<span class="asteriskField">*</span> </label> 
		<div> 
			<select name="loaitruyen" class="weui_input weui_select weui-select form-control" id="id_status"> 
				<option value="Truyện dịch" <?php if($post_truyen["loai_truyen"] == "Truyện dịch") echo 'selected'; ?>>Truyện dịch</option> 
				<option value="Truyện convert" <?php if($post_truyen["loai_truyen"] == "Truyện convert") echo 'selected'; ?>>Truyện convert</option> 
			</select> 
		</div> 
	</div> 

	<div id="div_id_status" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Trạng Thái<span class="asteriskField">*</span> </label> 
		<div> 
			<select name="status" class="weui_input weui_select weui-select form-control" id="id_status"> 
				<option value="Đang cập nhật" <?php if($post_truyen["trang_thai"] == "Đang cập nhật") echo 'selected'; ?>>Đang cập nhật</option> 
				<option value="Hoàn thành" <?php if($post_truyen["trang_thai"] == "Hoàn thành") echo 'selected'; ?>>Hoàn thành</option> 
				<option value="Ngừng" <?php if($post_truyen["trang_thai"] == "Ngừng") echo 'selected'; ?>>Ngừng</option>
			</select> 
		</div> 
	</div> 

	<div id="div_id_summary" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Giới Thiệu Truyện<span class="asteriskField">*</span> </label> 
		<div> 
			<div class="django-ckeditor-widget" data-field-id="id_summary"> 
				<textarea class="ckeditorwidget form-control" cols="40" id="id_summary" maxlength="2000" name="summary" placeholder="Tóm tắt truyện..." rows="10" data-processed="0"><?php echo str_replace("<br/>", "\n", $post_truyen['review']); ?></textarea>
			</div> 
			<small id="hint_id_summary" class="form-text text-muted">Tối đa 2000 ký tự. Tóm tắt cho truyện không nên quá dài mà nên ngắn gọn, tập trung, thú vị. Phần này rất quan trọng vì nó quyết định độc giả có đọc hay không.
			</small> 
		</div> 
	</div> 

	<div id="div_id_source" class="form-group"> 
		<label for="id_source" class="col-form-label ">Nguồn</label> 
		<div> 
			<input type="text" name="source" value="<?php echo $post_truyen['nguon']; ?>" class="weui_input weui_input weui-input form-control" maxlength="200" id="id_source" /> 
		</div> 
	</div> 

	<input class="btn btn-primary" type="submit" name="luu_lai" value="Lưu Lại">
	<input class="btn btn-success" type="submit" name="luu_lai_thoat" value="Lưu và Thoát">
</form>