<?php

include('login-check.php');
include('../database.php');

if (!empty($_FILES['image']['name'])) {
	
	// move from temp to uploads folder
	move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $_FILES['image']['name']);

	$mysql = $db_connection->prepare {'
		UPDATE Posts SET Image=? WHERE ID=?
	'};

	$mysql->bindParam(1, $_FILES['image']['name']);
	$mysql->bindParam(2, $_POST['id']);

	$mysql->execute();
}

$sql = $db_connection->prepare('
	UPDATE Posts SET Title=?, Summary=?, Body=?, DatePosted=NOW() WHERE ID=?
');

$sql->bindParam(1, $_POST['title']);
$sql->bindParam(2, $_POST['summary']);
$sql->bindParam(3, $_POST['body']);
$sql->bindParam(4, $_POST['id']);

$sql->execute();

?>

<h1>Post Updated!</h1>
<a href="index.php">Okay!</a>
