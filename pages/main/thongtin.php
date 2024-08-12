<?php
	// session_start();
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_user = "SELECT * FROM tbl_dangky WHERE id_dangky = $id_khachhang";
	$user_query = mysqli_query($mysqli,$sql_user);
?>
<div class="main1 main2">
                <div class="main1-header">
                    <p> Thông Tin Cá Nhân</p> 
                </div>
            
            <div class="tt" >


            <?php
					while($user = mysqli_fetch_array($user_query)){ 
					?>
          <div>Tên khách hàng:  <?php echo $user['tenkhachhang']; ?></div><br>
          <div> Email khách hàng: <?php echo $user['email']; ?></div><br>
          <div> Địa chỉ: <?php echo $user['diachi']; ?></div> <br>
          <div>Số Điện Thoại: <?php echo $user['dienthoai']; ?></div><br>			       
            
             
               
         <button><a href="index.php?quanly=suathongtin">Sửa Thông Tin Cá Nhân</a></button>
					<?php
					} 
					?>
                
                
                

                
                
                
            </div></div>

            <style>
              .tt{

              }
            </style>