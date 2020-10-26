<?php
	$res_update = $myApp->TruyenMoiUpdate_XemThem();
?>

<div class="my-card card shadow-sm">
	<h5 class="uncap card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fad fa-clock"></i> truyện mới cập nhật</h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php  
				while ($post_update = $res_update->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_update['id_truyen']; ?>/<?php echo $post_update['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_update['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_update['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_update['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Truyện Mới Cập Nhật"); 
</script>