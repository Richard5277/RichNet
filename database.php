<?php

try {
$db_connection = new PDO(
	'mysql:dbname=RichNet;host=localhost',
	'root',
	'root'
	);
} catch(PDDException $e){
	echo 'Connection Failed: ' .$e->getMessage();
	exit();

}

?>