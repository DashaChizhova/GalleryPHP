<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_database = "gallaryphp";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_database);
	
	if ($mysqli -> connect_error) {
		printf("Ошибка: %s\n", $mysqli -> connect_error);
		exit();
	};

	
?>