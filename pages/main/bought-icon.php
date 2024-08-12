<?php
    $sql_has = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
	$query_has = mysqli_query($mysqli,$sql_has);   		
?>

                    







<div class="news2">
<div class="items1">
                        
                        <?php
if(isset($_SESSION['cart'])){
$i = 0;
$tongtien = 0;
$dem=0;
foreach($_SESSION['cart'] as $cart_item){
  $dem++;
  $i++;

?>
    <div class="span-sl"> <?php echo $dem ?></div>
<?php
}
?>

<?php	
}
?>   

        
</div>

                        <a href="index.php?quanly=giohang"><i class="fas fa-shopping-cart"></i></a>
                        <div class="bought-content news-content">
                            <h3>Sản phẩm đang mua</h3>
                            <div class="bought-content-box">
                            <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
    $dem=0;
  	foreach($_SESSION['cart'] as $cart_item){
      $thanhtien = ($cart_item['soluong']*$cart_item['giasp']*(100 -$cart_item['sale']))/100;
  		$tongtien+=$thanhtien;
      $dem++;
  		$i++;

  ?>
  <div class="bought-content-box-item">
                                    <a href="index.php?quanly=giohang">
                                    <div class="box-item-img">
                                        <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" alt="item1">
                                    </div>
                                    <div class="box-item-text">
                                    <?php echo $cart_item['tensanpham']; ?>
                                    </div>
                                </a>
                                </div>
  <?php
  	}
  ?>
   <tr>
    <td colspan="8">
    	<p style="float: left; ">Tổng tiền: <span style="color:red;font-size: 16px;"><?php echo number_format($tongtien,0,',','.').'vnđ' ?></span> </p><br/>
      <div style="clear: both;"></div>
    </td>
      
   
  </tr>
  <?php	
  }else{
  ?>   
   <tr>
    <td ><p style="text-align: center;">Hiện tại giỏ hàng trống</p></td>
   
  </tr>
  <?php
  } 
  ?>
            
                            </div>
                            <h3 class="box-seemore"><a href="index.php?quanly=giohang">Xem tất cả trong giỏ hàng</a></h3>

                        </div>
                    </div>     