<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="./">Truyện Của Tôi</a></li>
	<li class="breadcrumb-item active">Tạo Truyện</li>
</ol>

<form method="post" action="xuly/them-truyen.php?user=<?php echo $_SESSION['t_user']; ?>" enctype="multipart/form-data" class="mt-4" id="id_form">

	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label  requiredField">Tựa Truyện</label>
		<div>
			<input type="text" name="title_truyen" value="" class="weui_input weui_input weui-input form-control" autofocus placeholder="Tên truyện" maxlength="50" required id="id_title" /> 
		</div> 
	</div> 

	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label  requiredField">Url Hình</label>
		<div>
			<input type="text" name="urlHinh" value="" class="weui_input weui_input weui-input form-control" autofocus="" placeholder="Link ảnh truyện" maxlength="2000" required id="id_title" /> 
		</div> 
	</div> 

	<div id="div_id_title" class="form-group"> 
		<label for="id_title" class="col-form-label  requiredField">Tác Giả</label>
		<div>
			<input type="text" name="tac_gia" value="" class="weui_input weui_input weui-input form-control" autofocus="" placeholder="Tác giả của truyện" maxlength="40" required id="id_title" /> 
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
			        <input type="checkbox" class="custom-control-input" name="ckb<?php echo $ck; ?>" value="<?php echo $post_tl['ten']; ?>" id="<?php echo $post_tl['ten']; ?>">
			        <label class="custom-control-label" for="<?php echo $post_tl['ten']; ?>"><?php echo $post_tl['ten']; ?></label>
		      	</div>
			</div>
			<?php $ck++;} ?>
		</div>

	</div> 

	<div id="div_id_status" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Loại Truyện<span class="asteriskField">*</span> </label> 
		<div> 
			<select name="loai_truyen" class="weui_input weui_select weui-select form-control" id="id_status"> 
				<option value="Truyện dịch" selected>Truyện dịch</option> 
				<option value="Truyện convert">Truyện convert</option> 
			</select> 
		</div> 
	</div> 

	<div id="div_id_status" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Trạng Thái<span class="asteriskField">*</span> </label> 
		<div> 
			<select name="status" class="weui_input weui_select weui-select form-control" id="id_status"> 
				<option value="Đang cập nhật" selected>Đang cập nhật</option> 
				<option value="Hoàn thành">Hoàn thành</option> 
				<option value="Ngừng">Ngừng</option>
			</select> 
		</div> 
	</div> 

	<div id="div_id_summary" class="form-group"> 
		<label for="id_status" class="col-form-label  requiredField">Giới Thiệu Truyện<span class="asteriskField">*</span> </label> 
		<div class=""> 
			<div class="django-ckeditor-widget" data-field-id="id_summary"> 
				<textarea class="ckeditorwidget form-control" cols="40" id="id_summary" maxlength="2000" name="summary" placeholder="Tóm tắt truyện..." rows="10" data-processed="0"></textarea>
			</div> 
			<small id="hint_id_summary" class="form-text text-muted">Tối đa 2000 ký tự. Tóm tắt cho truyện không nên quá dài mà nên ngắn gọn, tập trung, thú vị. Phần này rất quan trọng vì nó quyết định độc giả có đọc hay không.
			</small> 
		</div> 
	</div> 

	<div id="div_id_source" class="form-group"> 
		<label for="id_source" class="col-form-label ">Nguồn</label> 
		<div class=""> 
			<input type="text" name="source" value="" class="weui_input weui_input weui-input form-control" maxlength="100" id="id_source" /> 
		</div> 
	</div>

	<div class="text-center">
		<input class="btn btn-primary" type="submit" name="tao_truyen" value="Tạo Truyện">
	</div>
</form>