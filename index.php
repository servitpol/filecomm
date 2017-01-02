<?php
session_start();
include_once('core/connect.php');
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Тестовое задание для optimus-it</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="js/authscript.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <header class="container-fluid">
		<div class="col-lg-8">
			<a href="index.php" class="header-title">Тестовое задание для Optimus-it</a>
		</div>
		<div class="col-lg-4">
<?php 
if($_SESSION['email'] == NULL) {
	echo '<a href="index.php?page=1">Login </a>';
	echo '<a href="index.php?page=2"> Register</a>';
} else {
	echo ' '.$_SESSION['email'].'<span class="glyphicon glyphicon-user"></span> <a href="?page=4">Manage files </a> | '.'<a href="?exits"> Log out</a>';
}

if (isset($_GET['exits'])) {
session_destroy();
echo '<script>document.location="index.php"</script>'; 
exit;
}
?>
            
		</div>
    </header>
    
    	<div class="container">
		<div class="wrapper">
  	        <div class="row">
			
				<div class="col-lg-12">
				<?php 
				if(isset($_GET['page']) && ($_GET['page'] == 1)){
					include_once ('pages/auth.php');
				} else if(isset($_GET['page']) && ($_GET['page'] == 2)){
					include_once ('pages/register.php');
				} else if(isset($_GET['page']) && ($_GET['page'] == 3)){
					include_once ('pages/filemanag.php');
				} else if(isset($_GET['page']) && ($_GET['page'] == 4)){
					//если акканут не активирован через почту - не пускаем на страницу с файлами
					connect();
					$email = $_SESSION['email'];
					$result = mysql_query("SELECT * FROM Users WHERE `email` = '$email'");
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					if($row['status'] == 1){
					include_once ('pages/manfiles.php');
					} else {
						echo "Activate your account!";
					}
				} else {
					include_once ('pages/default.php');
				}
				?>
				</div>
    		</div><!-- row -->
    	</div><!-- container-->
    </div><!-- wrapper-->

    <footer>
		<div class="container">
			<div class="footer-content">
				<p>Тестовое задание для Optimus-it</p>
			</div>
		</div>
    </footer>
<script src="js/file.js"></script>
 </body>
</html>