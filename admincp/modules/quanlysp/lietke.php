<?php
	$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  ORDER BY id_sanpham DESC";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<div class="form">
<h2>Sản phẩm</h2>
<div class="table">

  <div class="table-title">
  	<div class="id3">Id</div> 
    <div class="Tensanpham">Tên sản phẩm</div>
    <div class="Hinhanh">Hình ảnh</div>
    <div class="Giasp" >Giá sp</div>
    <div class="Soluong">SL</div>
    <div class="Sale">Sale</div>
    <div class="Sanxuat"> Sản Xuất</div>
    <div class="Danhmuc">Danh mục</div>
    <div class="Masp">Mã sp</div>
    <div class="Trangthai">TT</div>
  	<div class="Quanly3">Quản lý</div>
    </div>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_sp)){
  	$i++;
  ?>
  <div class="table-sp">
    <div class="id3 sp"><?php echo $i ?></div>
    <div class="Tensanpham sp"><?php echo $row['tensanpham'] ?></div>
    <div class="Hinhanh sp"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></div>
    <div class="Giasp sp"><?php echo $row['giasp'] ?></div>
    <div class="Soluong sp"><?php echo $row['soluong'] ?></div>
    <div class="Sale sp"><?php echo $row['sale'] ?></div>
    <div class="Sanxuat  sp"><?php echo $row['sanxuat'] ?></div>
    <div class="Danhmuc sp"><?php echo $row['tendanhmuc'] ?></div> 
    <div class="Masp sp"><?php echo $row['masp'] ?></div>
    <div class="Trangthai sp">
      <?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      </div>
    
   	<div style="margin-top :10px" class="Quanly3 sp quanlysp" >
    <a class="sua-btn" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> 
   	</div>
   </div>
 
  <?php
  } 
  ?>
 
 
</div> <div class="input2">
	<a class="sua-btn" href="?action=quanlysp&query=them">Thêm sản phẩm</a>
	</div></div>