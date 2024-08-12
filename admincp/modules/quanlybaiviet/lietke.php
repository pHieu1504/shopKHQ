<?php
	$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC";
	$query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>

<div class="form">
<h2>Liệt kê danh mục bài viết</h2>
<div class="table">
  <div class="table-title">
    <div class="id3">Id</div>
    <div class="tenbaiviet">Tên bài viết</div>
    <div class="hinhanhbv">Hình ảnh</div>
    <div class="danhmucbv">Danh mục</div>
    <div class="tomtatbv">Tóm tắt</div>
    <div class="trangthaibv">Trạng thái</div>
  	<div class="quanlybv">Quản lý</div>
  </div>
  	
  

  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
  	$i++;
  ?>
     <div class="table-sp">
  	<div class="id3 sp"><?php echo $i ?></div>
    <div class="tenbaiviet sp"><?php echo $row['tenbaiviet'] ?></div>
    <div class="hinhanhbv sp"><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></div>
   
    <div class="danhmucbv sp"><?php echo $row['tendanhmuc_baiviet'] ?></div>
   
    <div class="tomtatbv sp"><?php echo $row['tomtat'] ?></div>
    <div class="trangthaibv sp">
    <?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </div>
   	<div class="quanlybv sp"> 
   		<a  class="xoa-btn" href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xoá</a>  <a class="sua-btn" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a> 
   </div>
     </div>

  <?php
  } 
  ?></div>
  <div class="input2">
	<a class="sua-btn" href="?action=quanlybaiviet&query=them">Thêm bài viết</a>
	</div>
</div>

