<?php
	$sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);
	
?>


<div class="main1 main2 ">
                <div class="main1-header">
                    <p> Tin tức Tổng Hợp</p> 
                  
                </div>
            
            <div class="main2-content" >


            <?php
					while($row_bv = mysqli_fetch_array($query_bv)){ 
					?>
					
                    <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>" class="main1-item">
                     <div class="main1-item-img">
                         <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="ban phim co">
                     </div>
                     <div class="main1-item-content">
                         <div class="item1-title"><?php echo $row_bv['tenbaiviet'] ?>
                         </div>
                         <div class="item1-title2"><?php echo $row_bv['tomtat'] ?></div>
                         
                        
                     </div>
                </a>

					<?php
					} 
					?>
                
                
                

                
                
                <div class="clear"></div>
            </div></div>
