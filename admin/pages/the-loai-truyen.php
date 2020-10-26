<?php  
	$res_tl = $myApp->GetAllTheLoaiTruyen();
	$count = 1;
?>
<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Truyện Của Tôi</a></li>
		<li class="breadcrumb-item active">Danh Sách Thể Loại</li>
	</ol>

	<a class="btn btn-sm btn-primary mb-3" href="index.php?q=them-the-loai"><i class="fal fa-plus"></i> Thêm Thể Loại</a>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th class="text-center" scope="col" width="80px;">#</th>
				<th class="text-center" scope="col">Tên Thể Loại</th>
				<th class="text-center" scope="col" width="100px;">Sửa</th>
				<th class="text-center" scope="col" width="100px;">Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				while ($post_all_tl = $res_tl->fetch_array()) {

			?>
			<tr>
				<th class="text-center" scope="row"><?php echo $count; ?></th>
				<td><?php echo $post_all_tl['ten']; ?></td>
				<td class="text-center"><a class="text-primary" href="index.php?q=sua-the-loai&id=<?php echo $post_all_tl['idTL']; ?>"><i class="far fa-edit"></i></a></td>
				<td class="text-center">
					<a class="text-danger" onclick="return confirm('Bạn có muốn xóa truyện [<?php echo $post_all_tl['ten']; ?>]?')" href="xuly/delete-the-loai-truyen.php?id=<?php echo $post_all_tl['idTL']; ?>&t=<?php echo $post_all_tl['ten']; ?>">
						<i class="far fa-trash-alt"></i>
					</a>
				</td>
			</tr>
			<?php $count++;} ?>

		</tbody>
	</table>
</div>