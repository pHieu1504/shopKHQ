<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHQ Shop</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <script src="./js/js.js" type="text/javascript"></script>
    <link href="css/owl.carousel.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js "></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <link href="css/glasscase.min.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.glasscase.min.js"></script>
    <link href="css/mobie.css" rel="stylesheet" />

</head>
<body>
    <div class="wrapper">
       
    <?php
			session_start();
			include("admincp/config/config.php"); 
            include("pages/menu.php");
			include("pages/main.php");
			include("pages/footer.php");
            include("pages/main/bought-icon.php");
            include("pages/main/news-icon.php");
            include("pages/end.php");
            include("pages/header.php");
           
            include("pages/main/bar-mobie.php")

		?>

   
</div>
    <script src="./js/js.js">
    </script>
</body>
</html>