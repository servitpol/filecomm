<?php
$userdir = $_SESSION['iduser'];  					
$usdir = 'uploads/'.$userdir;
$flagerror = 0;	
if(isset($_POST['upfile'])) {
	
	$whitelist = array(".doc", ".docx", ".xls", ".xlsx", ".pdf", ".jpg", ".png", ".rar", ".zip");
	
	foreach ($whitelist as $item) {
	if(preg_match("/$item\$/i", $_FILES['fn']['name'])){
	
		if($_FILES['fn']['error'] != 0) {
		echo '<h3 style="color:red;"> Error '.$_FILES['fn']['error'].'</h3>';
		}

		if(is_uploaded_file($_FILES['fn']['tmp_name'])){
			$filename = explode('.', $_FILES['fn']['name']);
			$ext = strtolower($filename[1]); //приводит к нижнему регистру если файл JPG
			
			if($_POST['titlef'] == NULL ) {
				$titlef = checkFileName($usdir, $filename[0], $ext);
				$file = $titlef.'.'.$ext;
				rename($_FILES['fn']['tmp_name'], $usdir.'/'.$file);
				$file_puth = $usdir.'/'.$file;
				$size = convertsize(filesize($file_puth));
			} else {
				$titlef = checkFileName($usdir, $_POST['titlef'], $ext);
				$file = $titlef.'.'.$ext;
				rename($_FILES['fn']['tmp_name'], $usdir.'/'.$file);
				$file_puth = $usdir.'/'.$file;
				$size = convertsize(filesize($usdir.'/'.$file));
			}
			if($_POST['descriptf'] == NULL ) {
				$descriptf = NULL;
			} else {
				$descriptf = $_POST['descriptf'];
			
			}
			
			connect();
			$result = mysql_query("INSERT INTO Manfiles (iduser, title, filetype, filesize, date, counterdown, descr, fileputh) VALUES 
			('$userdir', '$titlef', '$ext', '$size', NOW(), '0', '$descriptf', '$file_puth')");
			$flagerror = 1;
		}
	} 
	
}
if($flagerror == 0){
	echo '<h3 style="color:red;">Incorrect file extension </h3>';
} 
}
 
?>
