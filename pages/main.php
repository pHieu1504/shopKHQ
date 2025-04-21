<div class="main">

	<?php
	if (isset($_GET['quanly'])) {
		$tam = $_GET['quanly'];
	} else {
		$tam = '';
	}
	if ($tam == 'giohang') {
		include("main/giohang.php");
	} elseif ($tam == 'danhmucbaiviet') {
		include("main/danhmucbaiviet.php");
	} elseif ($tam == 'baiviet') {
		include("main/baiviet.php");
	} elseif ($tam == 'tintuc') {
		include("main/tintuc-all.php");
	} elseif ($tam == 'lienhe') {
		include("main/lienhe.php");
	} elseif ($tam == 'all-sp') {
		include("main/all-sp2.php");
	} elseif ($tam == 'sanpham') {
		include("main/sanpham.php");
	} elseif ($tam == 'dangky') {
		include("main/dangky.php");
	} elseif ($tam == 'thanhtoan') {
		include("main/thanhtoan.php");
	} elseif ($tam == 'dangnhap') {
		include("main/dangnhap.php");
	} elseif ($tam == 'timkiem') {
		include("main/timkiem.php");
	} elseif ($tam == 'camon') {
		include("main/camon.php");
	} elseif ($tam == 'thaydoimatkhau') {
		include("main/thaydoimatkhau.php");
	} else if ($tam == 'danhmucsanpham') {
		include("main/allsp_content.php");
	} else if ($tam == 'thongtin') {
		include("main/thongtin.php");
	} else if ($tam == 'donhang') {
		include("main/donhang.php");
	} else if ($tam == 'suathongtin') {
		include("main/suathongtin.php");
	}
	// else if($tam=='danhmucband'){
	// 	include("main/band-content.php");
	// } 

	else {
		include("main/index.php");
	}
	?>





</div>