<?php
	$sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
	$query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
?>



<div class="form">
	<h2>Sửa Danh Mục Bài Viết</h2>
<div class="table">
 <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
 <?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
 	?>
	  <div class="input1">
         <h3>Tên danh mục</h3>
	  	<input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet">
	  </div>
	<div class="input2">
	<input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết">
	</div>
	<?php
	  } 
	  ?>
 </form>
</div>
</div>




