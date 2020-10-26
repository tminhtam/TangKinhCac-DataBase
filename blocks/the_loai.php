<?php
	$t = $_GET['t'];
	$res_the_loai = $myApp->GetTruyenCungTL($t);
?>

<div class="my-card card shadow-sm">
	<h5 class="uncap card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fad fa-compass"></i> <?php echo $t; ?></h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php  
				while ($post_the_loai = $res_the_loai->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_the_loai['id_truyen']; ?>/<?php echo $post_the_loai['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_the_loai['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_the_loai['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_the_loai['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Thể Loại"); 
</script>