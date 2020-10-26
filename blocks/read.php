<?php  
	$idTruyen = $_GET['id'];
	$idChuong = $_GET['idChuong'];
	$t = $_GET['t'];
?>

<?php
	$myApp->TangLuotXem($idTruyen);
	$tua_truyen = $myApp->GetTenTruyen($idTruyen);
	$res_detail_chapter = $myApp->GetChuong($idChuong);
	$post_detail_chapter = $res_detail_chapter->fetch_array(MYSQLI_ASSOC);
	
?>

<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb shadow-sm">
			<li class="breadcrumb-item"><a href="./">Home</a></li>
			<li class="breadcrumb-item"><a href="truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>"><?php echo $tua_truyen; ?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Chương <?php echo $post_detail_chapter['so_chuong']; ?></li>
		</ol>
	</nav>

	<div id="body-truyen" class="container-fluid myboder-2 shadow-sm">
		<div class="setting-page mt-0">
			<span id="setting" class="btn btn-setting float-right"><i class="fad fa-cog"></i></span>
			<div class="cls"></div>
		</div>
		<div class="title-read-truyen mb-5">
			<h4 class="text-center font-roman font-weight-bolder">Chương <?php echo $post_detail_chapter['so_chuong']; ?>: <?php echo $post_detail_chapter['tua_chuong']; ?></h4>
		</div>
		<div class="content-truyen">
			<div class="phan-trang mb-3">
				<a class="btn my-btn-luot btn-trai btn-outline-secondary <?php echo $myApp->CheckChuongTruoc($post_detail_chapter['so_chuong'], $idTruyen); ?>" href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $myApp->CheckChuongTruoc($post_detail_chapter['so_chuong'], $idTruyen); ?>">← Prev</a>
				<a class="btn my-btn-luot btn-phai float-right btn-outline-secondary <?php echo $myApp->CheckChuongSau($idTruyen, $post_detail_chapter['so_chuong']); ?>" href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $myApp->CheckChuongSau($idTruyen, $post_detail_chapter['so_chuong']); ?>">Next →</a>
			</div>

			<p id="content-noi-dung" class="px-3"><?php echo $post_detail_chapter['noi_dung']; ?></p>

			<div class="phan-trang mb-3">
				<a class="btn my-btn-luot btn-trai btn-outline-secondary <?php echo $myApp->CheckChuongTruoc($post_detail_chapter['so_chuong'], $idTruyen); ?>" href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $myApp->CheckChuongTruoc($post_detail_chapter['so_chuong'], $idTruyen); ?>">← Prev</a>
				<a class="btn my-btn-luot btn-phai float-right btn-outline-secondary <?php echo $myApp->CheckChuongSau($idTruyen, $post_detail_chapter['so_chuong']); ?>" href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $myApp->CheckChuongSau($idTruyen, $post_detail_chapter['so_chuong']); ?>">Next →</a>
			</div>

			<div class="info-chap pb-2">
				<div class="mt-3"></div>
				<p class="py-0 px-3"><b>Ngày đăng:</b> <?php $myApp->ConvertDate($post_detail_chapter['ngay_dang']); ?></p>
				<p class="py-0 px-3"><b>Số chữ:</b> <?php echo str_word_count($post_detail_chapter['noi_dung']); ?></p>
			</div>
		</div>

		<div id="popu-father" class="container-fluid">
			<div id="span-close-nha"><span class="btn border-light rounded-circle float-right btn-closeee text-center mr-3 mt-2"><i class="far fa-times"></i></span><div class="cls"></div></div>
			
			<div id="popu" class="container">
				<form name="f_Font">
					<label class="font-weight-bolder text-light mt-2">Font Chữ</label>
					<select class="chonFont form-control">
						<option value="Helvetica" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Helvetica"){echo 'selected';}?> >Helvetica</option>
						<option value="Times New Roman" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Times New Roman"){echo 'selected';}?>>Times New Roman</option>
						<option value="Lora" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Lora"){echo 'selected';}?>>Lora</option>
						<option value="Playfair Display" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Playfair Display"){echo 'selected';}?>>Playfair Display</option>
						<option value="Open Sans Condensed" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Open Sans Condensed"){echo 'selected';}?>>Open Sans Condensed</option>
						<option value="Raleway" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Raleway"){echo 'selected';}?>>Raleway</option>
						<option value="David Libre" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "David Libre"){echo 'selected';}?> >David Libre</option>
					</select>
				</form>

				<form name="f_Size">
					<label class="font-weight-bolder text-light mt-2">Size Chữ</label>
					<select class="form-control chonSize">
						<option value="20px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "20px"){echo 'selected';}?> >20px</option>
						<option value="21px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "21px"){echo 'selected';}?> >21px</option>
						<option value="22px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "22px"){echo 'selected';}?> >22px</option>
						<option value="23px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "23px"){echo 'selected';}?> >23px</option>
						<option value="24px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "24px"){echo 'selected';}?> >24px</option>
						<option value="25px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "25px"){echo 'selected';}?> >25px</option>
						<option value="26px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "26px"){echo 'selected';}?> >26px</option>
						<option value="27px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "27px"){echo 'selected';}?> >27px</option>
						<option value="28px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "28px"){echo 'selected';}?> >28px</option>
						<option value="29px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "29px"){echo 'selected';}?> >29px</option>
						<option value="30px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "30px"){echo 'selected';}?> >30px</option>
					</select>
				</form>

				<form name="f_Them">
					<label class="font-weight-bolder text-light mt-2">Giao Diện</label>
					<select class="form-control chonBackGround">
						<option value="url(images/skin-default.jpg)" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "url(images/skin-default.jpg)"){echo 'selected';}?> >Cổ Trang</option>
						<option value="#FFFFFF" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#FFFFFF"){echo 'selected';}?> >Trắng</option>
						<option value="#e4e2e2" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#e4e2e2"){echo 'selected';}?> >Xám</option>
						<option value="#EEEEEE" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#EEEEEE"){echo 'selected';}?> >Mạc Định</option>
					</select>
				</form>

			</div>
		</div>
	</div>


</div>

<script type="text/javascript">
	$(document).ready(function(){
    	$("#setting").click(function(){
			$("#popu-father").show();
    	});

    	$("#span-close-nha").click(function(){
			$("#popu-father").hide();
    	});

    	$("select.chonFont").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#content-noi-dung').css("font-family", selectedCountry);
        	setCookie("tangkinhcac_fontFam",SetValueCookie(selectedCountry), 365);
    	});

    	$("select.chonBackGround").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#body-truyen').css("background", selectedCountry);
        	setCookie("tangkinhcac_bgColor",SetValueCookie(selectedCountry), 365);
    	});

    	$("select.chonSize").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#content-noi-dung').css("font-size", selectedCountry);
        	setCookie("tangkinhcac_sizeFon",SetValueCookie(selectedCountry), 365);
    	});
    });
</script>

<script type="text/javascript">
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length,c.length);
	        }
	    }
	    return "";
	}

	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function ReturnMyCookie(cname){
		var x = unescape(getCookie(cname));
		return x;
	}

	function SetValueCookie(value){
		var str_esc= escape(value);
		return str_esc;
	}

	$(document).ready(function(){
		$('#body-truyen').css("background", ReturnMyCookie("tangkinhcac_bgColor"));
		$('#content-noi-dung').css("font-family", ReturnMyCookie("tangkinhcac_fontFam"));
		$('#content-noi-dung').css("font-size", ReturnMyCookie("tangkinhcac_sizeFon"));
		
		//select option
		//$('.f_Them option[value='.ReturnMyCookie("tangkinhcac_bgColor").']').attr('selected','selected');
	});
</script>

<script type="text/javascript">
    $("title").text("Truyện <?php echo $tua_truyen; ?> - Chương <?php echo $post_detail_chapter['so_chuong']; ?>: <?php echo $post_detail_chapter['tua_chuong']; ?>"); 
</script>