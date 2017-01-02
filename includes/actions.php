<?php
session_start();
$iduser = $_SESSION['iduser'];
if($iduser == NULL) {
echo '<script>document.location="../index.php"</script>';
exit;
}
include_once('../core/connect.php');

if (isset($_POST['actdata'])){
	$form_data = json_decode($_POST['actdata'], true);
	//удаление файлов
	if($form_data['action'] == 'delete') {
		connect();
		$result = mysql_query('SELECT * FROM Manfiles WHERE id ='.$form_data['value']);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$url = '../'.$row['fileputh'];
		unlink ($url) or die ("error");
		mysql_query('DELETE FROM Manfiles WHERE id ='.$form_data['value']);
		echo json_encode($row);
	//скачивание файлов
	} else if ($form_data['action'] == 'download') {
		connect();
		$result = mysql_query('SELECT * FROM Manfiles WHERE id ='.$form_data['value']);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$result = mysql_query('UPDATE Manfiles SET counterdown = counterdown + 1  WHERE id ='.$form_data['value']);
		echo json_encode($row);
	//отображение данных в полях файла при редактировании
	} else {
		$_SESSION['actionid'] = $form_data['value'];
		connect();
		$result = mysql_query('SELECT * FROM Manfiles WHERE id ='.$form_data['value']);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		echo json_encode($row);
	}
}
//обновление данных файла
if (isset($_POST['upddata'])){
	$form_data = json_decode($_POST['upddata'], true);
	connect();
	$desc = mysql_real_escape_string($form_data['udescr']);
	$result = mysql_query('UPDATE Manfiles SET title = "'.$form_data['utitle'].'", descr = "'.$desc.'"  WHERE id ='.$_SESSION['actionid']);
	echo json_encode($result);
}
//данные при наведении мыши на description
if (isset($_POST['descinfo'])){
	$form_data = json_decode($_POST['descinfo'], true);
	connect();
	$result = mysql_query('SELECT * FROM Manfiles WHERE id ='.$form_data['value']);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	echo json_encode($row);
}
?>
