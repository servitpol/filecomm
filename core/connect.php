<?php
function connect($host = "servitsj.beget.tech", $user = "servitsj_fcomm", $pass = "123456", $dbname = "servitsj_fcomm") {
	
	$link = mysql_connect($host, $user, $pass) or die('Connection error');
	mysql_select_db($dbname) or die ('db select error');
	mysql_query('set names "utf8"');
}

?>