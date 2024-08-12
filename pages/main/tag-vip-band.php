<?php

$sql_danhmuc2 = "SELECT * FROM tbl_band ORDER BY id_band DESC";
$query_danhmuc2 = mysqli_query($mysqli,$sql_danhmuc2);
	
?>


<div class="tablinks-vip">
    <ul>
    <?php
	while($row_danhmuc2 = mysqli_fetch_array($query_danhmuc2)){ 
    ?>
     <li><a id="code1" onclick="click1()" href="index.php?quanly=danhmucband&id=<?php echo $row_danhmuc2['id_band'] ?>"><?php  echo $row_danhmuc2['tenband'] ?></a></li>

    <?php 
    }
    ?>
    <div class="clear"></div>
    </ul>
</div>


<style>
    .tablinks-vip{
        width: 1200px;
        margin: 0 auto;
        padding: 20px ;
        background-color: #fff;
        margin-bottom: 20px;
    }
    .tablinks-vip li{
        float: left;
        
    }
    .tablinks-vip li a{
        padding: 10px;
        border: 1px solid #000;
        border-radius: 10px;
        margin-right: 10px;
    }
    .tablinks-vip li a:hover{
        background-color: #000;
        color: #fff;
    }
    .show{
        background-color: #000;
    }
</style>

