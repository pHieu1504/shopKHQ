<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);


?>

<div class="main3-content_left">
	<ul class="main3-title">

		<div class="main-1">Danh mục sản phẩm
			<li><a href="index.php?quanly=all-sp">Tất Cả Sản Phẩm</a></li>
			<?php
			while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
			?>
				<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
			<?php
			}
			?>
		</div>

	</ul>
</div>

<style>
	.main-1 {
		font-size: 15px;


		margin: 0 15px 0 10px;
	}
</style>