<?php
session_start();
include_once('../core/connect.php');
//авторизация
if (isset($_POST['authdata'])){
	
	$req = false;
	$form_data = json_decode($_POST['authdata'], true);
	ob_start();

	$email = trim(htmlspecialchars($form_data['authemail']));
	$pass = md5($form_data['authpass']);

	connect();
	$result = mysql_query("SELECT * FROM Users WHERE `email` = '$email'");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);

	if ($row['email'] == NULL){
		echo 'You are not registered';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
	}else if($pass != $row['pass']){
		echo 'Invalid password';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
	} else {
		$_SESSION['iduser'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		echo '<script>document.location="../index.php"</script>';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
	}
}
?>