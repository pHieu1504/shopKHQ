
<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<div class="form">
	<h2>Sửa Danh Mục</h2>
<div class="table">
 <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 <?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
 	?>
	  <div class="input1">
         <h3>Tên danh mục</h3>
	  	<input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc'] ?>">
	  </div>
	<div class="input2">
	<input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm">
	</div>
	<?php
	  } 
	  ?>
 </form>
</div>
</div>

