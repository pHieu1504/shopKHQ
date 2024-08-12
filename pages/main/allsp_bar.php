<?php

	$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
	    		
?>

<div class="main3-content_left">
                    <ul>
                        
                        <div class="main3-title">Danh Mục sản phẩm</div>
                        <li><a href="index.php?quanly=all-sp">Tất Cả Sản Phẩm</a></li>
                        <?php 
				while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
				?>
				<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
				<?php
				} 
				?>

                    </ul>
                </div>