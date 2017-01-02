<?php
	include_once('connect.php');
	
	$ct1 ='create table Users(
		id int not null auto_increment primary key,		
		email varchar(128) unique,
		name varchar(64),
		pass varchar(256),
		code varchar(256),
		status int,
		info varchar(1024))default charset="utf8"';
		
	$ct2 ='create table Manfiles(
		id int not null auto_increment primary key,
		iduser int,
		foreign key(iduser) references Users(id) on delete cascade,
		title varchar(256),
		filetype varchar(8),
		filesize varchar(16),
		date datetime,
		counterdown int,
		descr varchar(512),
		fileputh varchar(512)
	)default charset="utf8"';
	
	connect();
	mysql_query($ct2);
	$err = mysql_errno();
	if($err){
		echo "Error: ".$err.'</br>';
	}


?>