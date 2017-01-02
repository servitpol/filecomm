<?php
session_start();
include_once('../core/connect.php');
if(!empty($_GET['code']) && isset($_GET['code'])) {
	
	connect();
	$code = mysql_real_escape_string($_GET['code']);
	$result = mysql_query("UPDATE Users SET status= 1 WHERE code='$code'");
	if ($result = true){
		$result = mysql_query("SELECT id FROM Users WHERE code='$code'");
		$row = mysql_fetch_array($result);
		$usdir = '../uploads/'.$row['id'];
		mkdir($usdir);
		$_SESSION['user'] == $row['id'];
		echo '<script>document.location="../index.php"</script>';
	} else {
		echo "error";
	}
}
?>