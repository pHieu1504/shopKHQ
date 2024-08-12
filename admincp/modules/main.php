<div class="clear"></div>
<div class="main1">

	<?php

				if(isset($_GET['action']) && $_GET['query']){
					$tam = $_GET['action'];
					$query = $_GET['query'];
				}else{
					$tam = '';
					$query = '';
				}
				if($tam=='quanlydanhmucsanpham' && $query=='them'){
					include("modules/quanlydanhmucsp/them.php");
					
				}elseif ($tam=='quanlydanhmucsanpham' && $query=='sua') {
					include("modules/quanlydanhmucsp/sua.php");

				}elseif($tam=='quanlydanhmucsanpham' && $query=='lietkedm'){
					include("modules/quanlydanhmucsp/lietke.php");

				}elseif($tam=='quanlybinhluan' && $query=='lietkebl'){
					include("modules/quanlybinhluan/lietke.php");

				}elseif ($tam=='quanlysp' && $query=='lietkesp') {
				
					include("modules/quanlysp/lietke.php");
				
				
				}elseif ($tam=='quanlysp' && $query=='them') {
					include("modules/quanlysp/them.php");
			

				}elseif($tam=='quanlysp' && $query=='sua'){
					include("modules/quanlysp/sua.php");

				}elseif($tam=='quanlydonhang' && $query=='lietke'){
					include("modules/quanlydonhang/lietke.php");

				}elseif($tam=='donhang' && $query=='xemdonhang'){
					include("modules/quanlydonhang/xemdonhang.php");

				}elseif($tam=='binhluan' && $query=='lietkebl'){
					include("modules/quanlybinhluan/lietke.php");

				}elseif($tam=='quanlydanhmucbaiviet' && $query=='them'){
					include("modules/quanlydanhmucbaiviet/them.php");
					include("modules/quanlydanhmucbaiviet/lietke.php");

				}elseif($tam=='quanlydanhmucbaiviet' && $query=='sua'){
					include("modules/quanlydanhmucbaiviet/sua.php");

				}elseif($tam=='quanlybaiviet' && $query=='lietkebv'){
					include("modules/quanlybaiviet/lietke.php");
				}elseif($tam=='quanlynguoidung' && $query=='lietke'){
					include("modules/quanlynguoidung/lietke.php");
					
				}elseif($tam=='quanlybaiviet' && $query=='sua'){
					include("modules/quanlybaiviet/sua.php");
				}elseif($tam=='quanlybaiviet' && $query=='them'){
					include("modules/quanlybaiviet/them.php");
				}
				elseif($tam=='quanlyweb' && $query=='capnhat'){
					include("modules/thongtinweb/quanly.php");
				}
				
				else{
					include("modules/dashboard.php");
				}
	?> 
	
</div>

<style>
	.main1{
		
		width: 80% !important;
		background-color: #fff;
		padding: 10px;
	}
</style>