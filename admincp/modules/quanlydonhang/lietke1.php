
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>

<div class="form">
<h2>Liệt kê đơn hàng</h2>
 <div class="table">
   <div class="table-title">
  	<div class="id3">ID</div>
    <div class="madonhang">Mã DH</div>
    <div class="tenkhachhang">Tên khách hàng</div>
    <div class="diachi">Địa chỉ</div>
    <div class="email">Email</div>
    <div class="sdt">Số điện thoại</div>
    <div class="TT">TT</div>
    <div class="date">Ngày đặt</div>
  	<div class="quanli_3">Quản lý</div>
  </div>

  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <div class="table-sp">

  	<div class="id3 sp"><?php echo $i ?></div>
    <div class="madonhang sp"><?php echo $row['code_cart'] ?></div>
    <div class="tenkhachhang sp"><?php echo $row['tenkhachhang'] ?></div>
    <div class="diachi sp"><?php echo $row['diachi'] ?></div>
    <div class="email sp"><?php echo $row['email'] ?></div>
    <div class="sdt sp"><?php echo $row['dienthoai'] ?></div>
    <div class="TT sp">
    	<?php if($row['cart_status']==1){
    		echo '<a class="makecolor" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Yes</a>';
    	}else{
    		echo 'Đã xác nhận';
    	}
    	?>
    </div>
    <div class="date sp"><?php echo $row['cart_date'] ?></div>
   	<div class="quanli_3 sp2">
   		<a class="xoa-btn"   href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem </a> 
   	</div>
   
 </div>
  <?php
  } 
  ?>
 
</div>
</div>