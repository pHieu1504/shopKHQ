<div class="header">

<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<p><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>
</div>
<style>
	.header p a{
	 color: #fff;
	 font-size: 16px;
	 padding: 10px;
	 background-color: red;
	 border-radius: 10px;
	 margin-left: 30px;
		
	}
	.header p a:hover{
		background-color: blue;
	}
</style>