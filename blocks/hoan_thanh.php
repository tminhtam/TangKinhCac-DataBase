<?php
	$res_hoan_thanh = $myApp->TruyenHoanThanh_XemThem();
?>

<div class="my-card card shadow-sm">
	<h5 class="uncap card-header font-roman py-2 font-weight-bolder my-t-shadow"><i class="fad fa-books"></i> truyện hoàn thành</h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php  
				while ($post_hoan_thanh = $res_hoan_thanh->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_hoan_thanh['id_truyen']; ?>/<?php echo $post_hoan_thanh['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_hoan_thanh['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_hoan_thanh['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_hoan_thanh['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Truyện Hoàn Thành"); 
</script>