<?php
	$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_band='$_GET[id]'   ORDER BY id_sanpham DESC";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_band WHERE tbl_band.id_band='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<?php
   include("tag-vip-band.php");
?>
<div class="main1">
<div class="main3-content_right">
                    <div class="main3-right-title">
                         Thương Hiệu :  <?php echo $row_title['tenband'] ?>
                    </div>
                    <?php
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
				
                    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="main1-item">
                    <div class="main1-item-img">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="ban phim co">
                    </div>
                    <div class="main1-item-content">
                        <div class="item1-title"> <?php echo $row['tensanpham'] ?> </div>
                        <div class="place">Sản xuất : <?php echo $row['sanxuat'] ?> </div>
                        <div class="box-price">
                            <div class="new-price1">
                        <?php 
                          if($row['sale'] > 0){
                             echo number_format(($row['giasp']*(100-$row['sale']))/100,0,',','.' ).' vnđ' ;
                          } else{
                            echo number_format($row['giasp'],0,',','.' ).' vnđ' ;
                          }
                          
                        ?>
                        
                          </div>
                          <div class="old-price1"><del>
                          <?php 
                          if($row['sale'] > 0){
                             echo number_format($row['giasp'],0,',','.' ).' vnđ' ;
                          }
                          
                        ?>
                          </del> </div>
                           
                       </div>
                       <div class="sale">
                       <?php 
                          if($row['sale'] > 0){
                              echo '-'.$row['sale'].'%';
                          }
                          
                        ?>
                        </div>
                    </div>
               </a>
					<?php
					} 
					?>
                   
               <div class="clear"></div>
                </div>