<?php
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_sua_user = "SELECT * FROM tbl_dangky WHERE id_dangky = $id_khachhang";
	$query_sua_user = mysqli_query($mysqli,$sql_sua_user);
?>

<div class="main1 main2">
                <div class="main1-header">
                    <p>Thông Tin</p> 
                    
                </div>
            
            <div class="main1-content owl-carousel" >
                <?php
     while($user = mysqli_fetch_array($query_sua_user)) {
?>


           <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $user['id_dangky']; ?>">
    <label for="tenkhachhang">Tên khách hàng:</label>
    <input type="text" id="tenkhachhang" name="tenkhachhang" value="<?php echo $user['tenkhachhang']; ?>"><br>
    <label for="email">Email khách hàng:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
    <label for="diachi">Địa chỉ:</label>
    <input type="text" id="diachi" name="diachi" value="<?php echo $user['diachi']; ?>"><br>
    <label for="dienthoai">Số Điện Thoại:</label>
    <input type="text" id="dienthoai" name="dienthoai" value="<?php echo $user['dienthoai']; ?>"><br>
    <input type="submit" name="suathongtin"value="Cập nhật thông tin">
   </form>
 <?php
 } 
 ?>      
 
 </div></div>