<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<div class="form">
<h2>Liệt kê danh mục sản phẩm</h2>
<div class="table">
 <div class="table-title">
   <div class="id">ID</div>
   <div class="Tendanhmuc">Tên Danh Mục</div>
   <div class="Quanly">Quản Lý</div>
 </div>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  	$i++;
  ?>
     <div class="table-title">
    <div class="id2"><?php echo $i ?></div>
  	<div class="Tendanhmuc2"><?php echo $row['tendanhmuc'] ?></div>
   <div class="Quanly2"><a class="xoa-btn" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>  <a class="sua-btn" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a> </div>
  </div>
   
  
  <?php
  } 
  ?>

</div>
 <div class="input2">
	<a class="sua-btn" href="?action=quanlydanhmucsp&query=them">Thêm danh mục sản phẩm</a>
	</div>
</div>
<!-- <a class="sua-btn" href="?action=quanlysp&query=them">Thêm</a>  -->
