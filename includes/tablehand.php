<?php
/* 
Файл формирования таблицы с пользователями для админа.
Обработчик собран из кусков кода представленных на сайтах:
https://datatables.net
https://coderexample.com/datatable-demo-server-side-in-phpmysql-and-ajax/

*/
session_start();
$iduser = $_SESSION['iduser'];
if($iduser == NULL) {
echo '<script>document.location="../index.php"</script>';
exit;
}
$servername = "servitsj.beget.tech";
$username = "servitsj_fcomm";
$password = "123456";
$dbname = "servitsj_fcomm";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$requestData= $_REQUEST;

$columns = array( 

	0 =>'id', 
	1 =>'title', 
	2 =>'extention', 
	3 =>'size', 
	4 =>'date', 
	5 =>'counterdown', 
	6 =>'descr'
);

$sql = "SELECT title, filetype, filesize, date, counterdown, descr ";
$sql.=" FROM Manfiles WHERE iduser='$iduser'";
$query=mysqli_query($conn, $sql) or die("tablehand.php: get Manfiles");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  


if( !empty($requestData['search']['value']) ) {
	
	$sql = "SELECT title, filetype, filesize, date, counterdown, descr ";
	$sql.=" FROM Manfiles WHERE iduser='$iduser'";
	$sql.=" WHERE title LIKE '".$requestData['search']['value']."%' "; 
	$sql.=" OR filetype LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR filesize LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR date LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR counterdown LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR descr LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("tablehand.php: get Manfiles");
	$totalFiltered = mysqli_num_rows($query); 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("tablehand.php: get Manfiles");
	
} else {	

	$sql = "SELECT id, title, filetype, filesize, date, counterdown, descr ";
	$sql.=" FROM Manfiles WHERE iduser='$iduser'";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("tablehand.php: get Manfiles");
	
}

$data = array();
$i= 1;
while( $row=mysqli_fetch_array($query) ) { 
	$desc = substr($row['descr'], 0, 20);
	$desc = htmlspecialchars($desc);
	$nestedData=array(); 
	$nestedData[] = $i;
	$nestedData[] = $row['title'];
	$nestedData[] = $row['filetype'];
	$nestedData[] = $row['filesize'];
	$nestedData[] = $row['date'];
	$nestedData[] = $row['counterdown'];
	$nestedData[] = '<button class="descrinfo btn btn-link" name="descrinfo" value="'.$row['id'].'">'.$desc.'</button><div class="descinfo" id="descrinfo'.$row['id'].'"></div>';	
	$nestedData[] = '<button class="actions btn btn-link" name="download" value="'.$row['id'].'">Download</button><button class="actions btn btn-link" name="edit" value="'.$row['id'].'">Edit</button><button class="actions btn btn-link" name="delete" value="'.$row['id'].'">Delete</button>';
	$data[] = $nestedData;
	$i++;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ), 
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

echo json_encode($json_data); 

?>
