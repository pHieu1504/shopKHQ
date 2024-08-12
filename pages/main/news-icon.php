<?php
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);   		
?>
<div class="news">
                        <a href=""><i class="fas fa-newspaper"></i></a>
                        <div class="bought-content news-content">
                            <h3>Tin Tức Tổng Hợp</h3>
                            <div class="bought-content-box">
                            <?php
				             	while($row_bv = mysqli_fetch_array($query_bv)){ 
					         ?>
					
                   
                    <div class="bought-content-box-item">
                                    <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                                    <div class="box-item-img">
                                        <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="item1">
                                    </div>
                                    <div class="box-item-text">
                                    <?php echo $row_bv['tenbaiviet'] ?>
                                    </div>
                                </a>
                                </div>
					<?php
					} 
					?>                                
                            </div>
                            <h3 class="box-seemore"><a href="index.php?quanly=tintuc">Xem tất cả tin tức</a></h3>

                        </div>
                    </div>