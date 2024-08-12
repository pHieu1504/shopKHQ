
<p class="chitiet"> <a href="index.php?quanly=home">Home </a> / Giỏ Hàng</p>
<div class="main1 main-giohang">
<p> 
  <?php
  if(isset($_SESSION['dangky'])){
    echo 'xin chào: '.'<span style="color:red;font-size:20px;padding-top:20px">'.$_SESSION['dangky'].'</span>';
   
  } 
  ?>
</p>
<?php
	if(isset($_SESSION['cart'])){
		
	}
?>
<table style="width:100%;text-align: center;border-collapse: collapse;margin-top:20px" >
  <tr class="header-table">
    <th class="id">STT</th>
    <th class="masp2">Mã sp</th> 
    <th class="hinhanh">Hình ảnh</th>
    <th class="tensp">Tên sản phẩm</th>
   
    <th class="soluong">Số lượng</th>
    <th class="giasp">Giá sản phẩm</th>
    <th class="thanhtien">Thành tiền</th>
    <th class="quanly">Quản lý</th>
  </tr>
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
  <tr style="margin-top: 20px;" class="pc-thanhtoan">
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp']; ?></td>
   <td class="hinhanh"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
   
    <td class="soluong2">
    	<a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
    <?php echo $cart_item['soluong']; ?>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>

    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').' vnđ'; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').' vnđ' ?></td>
    <td class="delete"><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xoá</a></td>
  </tr>

  <div class="media-thanhtoan">
    <div class="stt-tt"><?php echo $i; ?></div>
    <div class="gr1">
      <div class="ha-sp">
      <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px">
      </div>
      <div class="tensp">
      <?php echo $cart_item['tensanpham']; ?>
      </div>
      <div class="soluongsp">
      <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
    <?php echo $cart_item['soluong']; ?>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
      </div>
      
      <div class="all-price">
      <?php echo 'Thành tiền : ' .number_format($thanhtien,0,',','.').' vnđ' ?>
      </div>
        
      </div>
      <div class="gr2 delete">
      <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xoá</a>
      </div>
    </div>
  </div>
  <?php
  	}
  ?>
   <tr>
    <td colspan="8" style="border-top: 1px solid #ccc; padding-top:20px">
    	<p style="float: right;" class="sum-mn">Tổng tiền: <span><?php echo number_format($tongtien,0,',','.').'vnđ' ?></span> </p><br/>
      <div class="clear"></div>
    	<p style="float: right;" class="delete delete-all"><a href="pages/main/themgiohang.php?xoatatca=1">Xoá tất cả</a></p>
      <div style="clear: both;"></div>
      <p style="float: left;" class="number-items"> Tổng số sản phẩm : <span> <?php echo $dem; ?></span></p>
      
      <?php
        if(isset($_SESSION['dangky'])){
          ?>
           <p><a href="pages/main/ttthanhtoan.php" class="dathang">Đặt hàng</a></p>
      <?php
        }else{
      ?>
        <p><a href="index.php?quanly=dangky" class="dathang">Đăng ký đặt hàng</a></p>
      <?php
        }
      ?>
      
     


    </td>

   
  </tr>
  <?php	
  }else{ 
  ?>
   <tr>
    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>



</div>