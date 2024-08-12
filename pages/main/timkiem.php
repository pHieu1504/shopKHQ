<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<div class="main1">
<h3 class="search-title1" style="margin-bottom: 20px;">Sản phẩm cho từ khóa : <span class="title-search"><?php echo $_POST['tukhoa']; ?></span> </h3>
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
