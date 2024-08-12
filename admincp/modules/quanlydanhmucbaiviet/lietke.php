<?php
	$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet";
	$query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
?>

<div class="form">
<h2>Liệt kê danh mục Bài viết</h2>
<div class="table">
 <div class="table-title">
   <div class="id">ID</div>
   <div class="Tendanhmuc">Tên Danh Mục Bài viết</div>
   <div class="Quanly">Quản Lý</div>
 </div>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
  	$i++;
  ?>
     <div class="table-title">
    <div class="id2"><?php echo $i ?></div>
  	<div class="Tendanhmuc2"><?php echo $row['tendanhmuc_baiviet'] ?></div>
   <div class="Quanly2"><a class="xoa-btn" href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xóa</a>  <a class="sua-btn" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a> </div>
  </div>
   
  
  <?php
  } 
  ?>
 
</div>
</div>




