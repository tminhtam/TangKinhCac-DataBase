<?php  
	$idTruyen = $_GET['id'];
	$t = $_GET['t'];
?>

<?php
	$res_chi_tiet_truyen = $myApp->ChiTietTruyen($idTruyen);
	$post_chi_tiet_truyen = $res_chi_tiet_truyen->fetch_array(MYSQLI_ASSOC);
	$res_5_chuong = $myApp->Get5ChuongMoi($idTruyen);
	$res_list_chuong = $myApp->GetListChuong($idTruyen);
	$res_the_loai = $myApp->GetTheLoai($idTruyen);
?>

<script type="text/javascript">
    var toancuc = 1;
    var tongtrang = <?php $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']); ?>;
    $(document).ready(function(){
        $("#btn-sau").click(function(){
            toancuc += 1;
            
            if(toancuc <= tongtrang){
                $.get("blocks/AjaxGetChuong.php", {id:<?php echo $idTruyen; ?>,tong:<?php echo $post_chi_tiet_truyen['so_chuong']; ?>,page:toancuc, t:"<?php echo $t; ?>"}, function(data){
                    $("#list-chaps").html(data);
                    $("#page-of").html(toancuc+" of <?php echo $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']); ?>");
                }); 
            }
            else{
                toancuc -= 1;
            }  
        });

        $("#btn-truoc").click(function(){
            toancuc -= 1;
            
            if(toancuc > 0){
                $.get("blocks/AjaxGetChuong.php", {id:<?php echo $idTruyen; ?>,tong:<?php echo $post_chi_tiet_truyen['so_chuong']; ?>,page:toancuc, t:"<?php echo $t; ?>"}, function(data){
                    $("#list-chaps").html(data);
                    $("#page-of").html(toancuc+" of <?php echo $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']); ?>");
                });
            }
            else{
                toancuc += 1;
            } 
        });

        $("#btn-fist").click(function(){
            toancuc = 1;
            
            if(toancuc > 0){
                $.get("blocks/AjaxGetChuong.php", {id:<?php echo $idTruyen; ?>,tong:<?php echo $post_chi_tiet_truyen['so_chuong']; ?>,page:toancuc, t:"<?php echo $t; ?>"}, function(data){
                    $("#list-chaps").html(data);
                    $("#page-of").html(toancuc+" of <?php echo $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']); ?>");
                });
            }
            else{
                toancuc += 1;
            } 
        });

        $("#btn-tail").click(function(){
            toancuc = tongtrang;
            
            if(toancuc <= tongtrang){
                $.get("blocks/AjaxGetChuong.php", {id:<?php echo $idTruyen; ?>,tong:<?php echo $post_chi_tiet_truyen['so_chuong']; ?>,page:toancuc, t:"<?php echo $t; ?>"}, function(data){
                    $("#list-chaps").html(data);
                    $("#page-of").html(toancuc+" of <?php echo $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']); ?>");
                }); 
            }
            else{
                toancuc -= 1;
            }  
        });
    });
</script>

<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb shadow-sm">
			<li class="breadcrumb-item"><a href="./">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $post_chi_tiet_truyen['tua_truyen']; ?></li>
		</ol>
	</nav>

	<div class="row shadow-sm">
		<div class="col-md-3">
			<img class="img-fluid myboder-2 mx-auto my-vien" src="<?php echo $post_chi_tiet_truyen['thumbnail']; ?>">
			<h4 class="text-center mt-2"><?php echo $post_chi_tiet_truyen['tua_truyen']; ?></h4>
			<p><b>Tác giả: </b><a href="tac-gia/<?php echo $post_chi_tiet_truyen['tac_gia']; ?>"><?php echo $post_chi_tiet_truyen['tac_gia']; ?></a></p>
			<p><b>Thể loại: </b>
				<?php  
					$so_tl = mysqli_num_rows($res_the_loai);
					$count_tl = 0;
					while ($post_tl = $res_the_loai->fetch_array(MYSQLI_ASSOC)) { $count_tl++;
				?>
				<a href="the-loai/<?php echo $post_tl['ten_tl']; ?>"><?php echo $post_tl['ten_tl']; ?></a><?php if($count_tl < $so_tl) echo ','; ?>
				<?php } ?>
			</p>
			<p class="nguon"><b>Nguồn: </b><?php echo $post_chi_tiet_truyen['nguon']; ?></p>
		</div>
		<div class="col-md-9">
			<h2 id="title-md" class="text-center mt-2"><?php echo $post_chi_tiet_truyen['tua_truyen']; ?></h2>
			<div class="info-thong-so text-center mt-3">
				<span class="my-btn my-1 badge badge-primary font-weight-bolder my-gage"><?php echo $post_chi_tiet_truyen['trang_thai']; ?></span>
				<span class="my-btn my-1 badge badge-info font-weight-bolder my-gage"><?php echo $post_chi_tiet_truyen['loai_truyen']; ?></span>
				<span class="my-btn my-1 badge badge-success font-weight-bolder my-gage"><?php echo $post_chi_tiet_truyen['so_chuong']; ?> chương</span>
				<span class="my-btn my-1 badge badge-secondary font-weight-bolder my-gage"><?php echo $post_chi_tiet_truyen['luot_xem']; ?> lượt đọc</span>
			</div>
			<div class="share-save text-center mt-3">
				<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="fas fa-exclamation-triangle fa-lg"></i></button>
				<button id="mark-book" class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="far fa-heart fa-lg"></i></button>
				<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="fad fa-share-alt fa-lg"></i></button>
				<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="fas fa-comment-alt-lines fa-lg"></i></button>
			</div>
			<div class="frame-read mt-3">
				<a class="read-story btn btn-primary btn-lg btn-block shadow-sm <?php echo $myApp->BatDauDocTruyen($idTruyen, $post_chi_tiet_truyen['so_chuong']); ?>" href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $myApp->BatDauDocTruyen($idTruyen, $post_chi_tiet_truyen['so_chuong']); ?>">đọc truyện</a>
				<a class="download-story btn btn-primary btn-lg btn-block shadow-sm" href="#">download ebook prc</a>
			</div>
			<div class="ngay-tao mt-3">
				<p class="py-0 my-0">Ngày tạo: <?php $myApp->ConvertDate($post_chi_tiet_truyen['ngay_dang']); ?></p>
				<p class="py-0 my-0">Cập nhật: <?php $myApp->ConvertDate($post_chi_tiet_truyen['ngay_update']); ?></p>
			</div>
			<div class="review-truyen mt-3">
				<div class="pb-2"><h3 class="title-review"><i class="fad fa-book-reader"></i> GIỚI THIỆU TRUYỆN</h3></div>
				<p><?php echo $post_chi_tiet_truyen['review']; ?></p>
			</div>
			<div class="chuong-moi-5 mt-3">
				<div class="pb-2"><h3 class="title-review"><i class="fad fa-galaxy"></i> 5 chương mới nhất</h3></div>
				<ul>
					<?php  
						while ($post_5_chuong = $res_5_chuong->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li><a href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $post_5_chuong['id_chuong']; ?>">Chương <?php echo $post_5_chuong['so_chuong']; ?>: <?php echo $post_5_chuong['tua_chuong']; ?></a> <small>(<?php $myApp->ConvertDate($post_5_chuong['ngay_dang']); ?>)</small></li>
					<?php } ?>
				</ul>
			</div>
			<div class="list-chapter mt-3">
				<div class="pb-2"><h3 class="title-review"><i class="fad fa-fire-alt"></i> danh sách chương</h3></div>
				<ul id="list-chaps">
					<?php  
						while ($post_list_chuong = $res_list_chuong->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li><a href="doc-truyen/<?php echo $idTruyen; ?>/<?php echo $t; ?>/<?php echo $post_list_chuong['id_chuong']; ?>">Chương <?php echo $post_list_chuong['so_chuong']; ?>: <?php echo $post_list_chuong['tua_chuong']; ?></a></li>
					<?php } ?>
				</ul>
			</div>

			<div class="mb-2 mt-2"><img class="mx-auto d-block" src="images/bg_bottom.png"></div>
			
		</div>
	</div>
</div>

<div class="my-pagination mt-4 text-center my-3">
	<span id="btn-fist" class="btn"><i class="fad fa-backward"></i></span>
	<span id="btn-truoc" class="btn btn-outline-secondary btn-trang"><i class="fas fa-caret-left"></i> Prev</span>

	<span id="page-of" class="btn btn-outline-secondary btn-page-of disabled">1 of 
		<?php 
			if($post_chi_tiet_truyen['so_chuong'] <= 0) 
				echo '1'; 
			else 
				echo $myApp->SoTrang($post_chi_tiet_truyen['so_chuong']);
		?></span>

	<span id="btn-sau" class="btn btn-outline-secondary btn-trang">Next <i class="fas fa-caret-right"></i></span>
	<span id="btn-tail" class="btn"><i class="fad fa-forward"></i></span>
</div>

<div class="ah-pif-footer mt-1">
    <div class="fb-comments" data-href="http://tangkinhcac.atwebpages.com/id=<?php echo $idTruyen; ?>" data-numposts="5" data-order-by="reverse_time" colorscheme="light" data-colorscheme="light" data-width="100%" width="100%"></div>      
</div>

<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=527870361017285&autoLogAppEvents=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#mark-book').click(function(){
			alert('tính năng này hiện đang phát triển!');
		});
	});
</script>

<script type="text/javascript">
    $("title").text("Truyện <?php echo $post_chi_tiet_truyen['tua_truyen']; ?>"); 
</script>