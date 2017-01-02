<?php
session_start();
$iduser = $_SESSION['iduser'];
if($iduser == NULL) {
echo '<script>document.location="../index.php"</script>';
exit;
}
//ф-ция формирования размера файлов
function convertsize($filesize) {
	
	if($filesize < 1024000) {
		$result = round($filesize/1000).' kb';
		if($result != 0){
			return $result;
		} else {
			$result = '1 kb';
			return $result;	
		}
	} else {
		$result = round($filesize/1000000).' Mgb';
		return $result;
	}

}
//ф-ция проверки и генерации уникального имени файла
function checkFileName ($usdir, $titlef, $ext){
	
	$file_puth = $usdir.'/'.$titlef.'.'.$ext;
	//если файл с таким именем существует - добавляем ему в имя "($i)"
	if(file_exists($file_puth)) {
		for($i=1; file_exists($file_puth); $i++) {
			$newtitlef = $titlef.'('.$i.')';
			$file_puth = $usdir.'/'.$newtitlef.'.'.$ext;
		}
		return $newtitlef;
	} else {
		return $titlef;
	}	
}
?>