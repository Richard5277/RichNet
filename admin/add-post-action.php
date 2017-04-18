<?php

include('login-check.php');
include('../database.php');
include('thumbnail-function.php');

//check if file was included
if (!empty($_FILES['image']['name'])) {
	
	// move from temp to uploads folder
	move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $_FILES['image']['name']);


}

// Prepare SQL statement
$sql = $db_connection->prepare('
	INSERT INTO Posts(Title, Summary, Body, DatePosted, Image)
	VALUES(?,?,?,NOW(),?)
');

// Replace ? with actual value
$sql->bindParam(1, $_POST['title']); // match with what you have in the form
$sql->bindParam(2, $_POST['summary']);
$sql->bindParam(3, $_POST['body']);
// $sql->bindParam(4, $_POST['date_posted']);
$sql->bindParam(4, $_FILES['image']['name']);

$sql->execute();

?>

<h1>Post Added</h1>
<a href="index.php">Post Added! Go Back to Admin</a><br><br>
<a href="../index.php">Post Added! Go Back to Website</a>