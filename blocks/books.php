<?php
	$res_books = $myApp->GetBooks($myApp->GetNameUser());
?>

<div class="my-card card shadow-sm">
	<h5 class="uncap card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fad fa-books"></i> Tryuện Của Tôi</h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php  
				while ($post_books = $res_books->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_books['id_truyen']; ?>/<?php echo $post_books['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_books['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_books['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_books['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Truyện Của Tôi"); 
</script>