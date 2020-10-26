<?php
	$res_truyen_update = $myApp->TruyenMoiUpdate();
	$res_truyen_HOT = $myApp->TruyenHOT();
	$res_truyen_HoanThanh = $myApp->TruyenHoanThanh();
	$res_9TruyenTienHiep = $myApp->Get9TruyenTienHiepHOT();
	$res_9TruyenHuyenHuyen = $myApp->Get9TruyenHuyenHuyenHOT();
	$res_9TruyenDoThi = $myApp->Get9TruyenDoThiHOT();
	$res_9TruyenNgonTinh = $myApp->Get9TruyenNgonTinhHOT();
?>

<div class="row">
	<div class="col-md-8 py-1">
		<div class="my-card card shadow-sm">
			<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="far fa-stopwatch"></i> TRUYỆN MỚI UPDATE <a class="float-right bgg-trang" href="update"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
			<div class="card-body py-0 pb-3 my-pad">
				<div class="row">
					<?php  
						while ($post_update = $res_truyen_update->fetch_array(MYSQLI_ASSOC)) {
					?>
					<div class="col-md-4 col-6 my-2 test">
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
	</div>

	<div class="col-md-4 py-1 mr-truyenhoanthanh">
		<div class="my-card card shadow-sm">
			<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fab fa-stack-overflow"></i> TRUYỆN HOÀN THÀNH <a class="float-right bgg-trang" href="full"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
			<div class="card-body py-0 pb-2">
				<ul class="ul-hoan-thanh">
					<?php  
						while ($post_complete = $res_truyen_HoanThanh->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li class="py-2">
						<a class="d-block font-roman chu-nau an-chu hover truyen-hoan-thanh" href="truyen/<?php echo $post_complete['id_truyen']; ?>/<?php echo $post_complete['tua_khong_dau']; ?>"><i class="fad fa-bookmark fa-fw"></i> <?php echo $post_complete['tua_truyen']; ?></a>
						<a class="d-block font-roman chu-nau an-chu hover truyen-tac-gia" href="tac-gia/<?php echo $post_complete['tac_gia']; ?>"><small><i class="fal fa-user fa-fw"></i> <?php echo $post_complete['tac_gia']; ?></small></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 mt-2"><a href="#"><img class="img-fluid" src="images/banner1.jpg"></a></div>

<div class="my-card card shadow-sm mt-3">
	<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="far fa-fire-alt"></i> TRUYỆN HOT <a class="float-right bgg-trang" href="hot"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php  
				while ($post_HOT = $res_truyen_HOT->fetch_array(MYSQLI_ASSOC)) {
			?>			
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $post_HOT['id_truyen']; ?>/<?php echo $post_HOT['tua_khong_dau']; ?>">
						<div class="card-body py-0 px-0 position-relative">
							<img src="<?php echo $post_HOT['thumbnail']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $post_HOT['so_chuong']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $post_HOT['tua_truyen']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container-fluid px-0 mt-3 banner-benduoi"><a href="#"><img class="img-fluid" src="images/banner3.jpg"></a></div>

<div class="row mt-3">
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fab fa-phoenix-squadron fa-fw"></i> Tiên Hiệp <a class="float-right bgg-trang" href="the-loai/Tiên+Hiệp"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<?php 
						$tienhiep = 1;
						while ($post_9TienHiep = $res_9TruyenTienHiep->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $post_9TienHiep['id_truyen']; ?>/<?php echo $post_9TienHiep['tua_khong_dau']; ?>"><span class="badge badge-primary rounded-circle"><?php echo $tienhiep; ?></span> <?php echo $post_9TienHiep['tua_truyen']; ?></a></li>
					<?php $tienhiep++;} unset($tienhiep); ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fab fa-phoenix-framework fa-fw"></i> Huyền Huyễn <a class="float-right bgg-trang" href="the-loai/Huyền+Huyễn"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<?php 
						$huyenhuyen = 1;
						while ($post_9TruyenHuyenHuyen = $res_9TruyenHuyenHuyen->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $post_9TruyenHuyenHuyen['id_truyen']; ?>/<?php echo $post_9TruyenHuyenHuyen['tua_khong_dau']; ?>"><span class="badge badge-primary rounded-circle"><?php echo $huyenhuyen; ?></span> <?php echo $post_9TruyenHuyenHuyen['tua_truyen']; ?></a></li>
					<?php $huyenhuyen++;} unset($huyenhuyen); ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fas fa-city"></i> Đô Thị <a class="float-right bgg-trang" href="the-loai/Đô+Thị"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<?php 
						$dothi = 1;
						while ($post_9TruyenDoThi = $res_9TruyenDoThi->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $post_9TruyenDoThi['id_truyen']; ?>/<?php echo $post_9TruyenDoThi['tua_khong_dau']; ?>"><span class="badge badge-primary rounded-circle"><?php echo $dothi; ?></span> <?php echo $post_9TruyenDoThi['tua_truyen']; ?></a></li>
					<?php $dothi++;} unset($dothi); ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fas fa-heart"></i> Ngôn Tình <a class="float-right bgg-trang" href="the-loai/Ngôn+Tình"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<?php 
						$ngontinh = 1;
						while ($post_9TruyenNgonTinh = $res_9TruyenNgonTinh->fetch_array(MYSQLI_ASSOC)) {
					?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $post_9TruyenNgonTinh['id_truyen']; ?>/<?php echo $post_9TruyenNgonTinh['tua_khong_dau']; ?>"><span class="badge badge-primary rounded-circle"><?php echo $ngontinh; ?></span> <?php echo $post_9TruyenNgonTinh['tua_truyen']; ?></a></li>
					<?php $ngontinh++;} unset($ngontinh); ?>
				</ul>
			</div>
		</div>
	</div>
</div>