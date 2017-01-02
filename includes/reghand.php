<?php
session_start();
include_once('../core/connect.php');
//регистрация нового пользователя
if (isset($_POST['regdata'])){
	
	$base_url = "http://servitsj.bget.ru/";	//урл где находится сайт
	$req = false;
	$form_data = json_decode($_POST['regdata'], true);
	ob_start();
	
	$email = trim(htmlspecialchars($form_data['regemail']));
	connect();
	$result = mysql_query("SELECT * FROM Users WHERE `email` = '$email'");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
		
	//проверка существует ли пользователь с таким email
	if ($row['email'] != NULL){
		echo 'You already are registered';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
		
	} else if($form_data['regemail'] && $form_data['regpass'] == $form_data['regpassr']){

	$name = $form_data['regname'];
	$info = $form_data['reginfo'];
	$pass = md5($form_data['regpass']);
	//генерируем код активации
	$code = md5($email.time());

	connect();
	$result = mysql_query("INSERT INTO Users (email,name, pass, code, status, info) VALUES ('$email','$name','$pass', '$code', '2', '$info')");
	
	if ($result = true){
	
		$subject = 'Активация электронной почты'; 					
		$message = '
				<html>
					<head>
						<title>'.$subject.'</title>
					</head>
					<body>
						<p>Активируйте адресс электронной почты перейдя по ссылке</p>
						<p>Ваш логин(e-mail): '.$email.'</p>
						<p>Ссылка: <a href="'.$base_url.'activation/active.php?code='.$code.'">'.$base_url.'activation/'.$code.'</a></p>
					</body>
				</html>'; 
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: Отправитель <smartinetseo@gmail.com>\r\n";
		mail($email, $subject, $message, $headers);
				
		echo 'An activation code is sent to your email';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
	}else{
		echo 'Error';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
		exit;
	}
	
}

}
?>
