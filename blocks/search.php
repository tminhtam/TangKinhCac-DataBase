<?php
	$t = str_replace("#", "", $_GET['search']);
	$res_search = $myApp->SearchTruyen($t);
	$kq = mysqli_num_rows($res_search);
?>

<div class="my-card card shadow-sm">
	<h5 class="uncap card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fab fa-searchengin"></i> tìm thấy: <?php echo $kq; ?> truyện</h5>
	<div class="card-body py-0 my-pad">
		<div class="row">
			<?php  
				while ($post_search = $res_search->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_search['id_truyen']; ?>/<?php echo $post_search['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_search['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_search['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_search['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Tìm Kiếm"); 
</script>