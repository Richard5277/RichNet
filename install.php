<?php

// Connection

include('database.php');

// Create a post table
$result = $db_connection->query('
	CREATE TABLE Posts(
		ID INT AUTO_INCREMENT,
		Title VARCHAR(255),
		Body TEXT,
		Summary TEXT,
		DatePosted DATETIME,
		Image VARCHAR(255), 
		PRIMARY KEY(ID)
	)
');

$db_connection->query('
	CREATE TABLE Users(
		ID INT AUTO_INCREMENT,
		Username VARCHAR(255),
		Password VARCHAR(255),
		PRIMARY KEY(ID)
	)
');

$db_connection->query('
	INSERT INTO Posts(Title, Body, Summary, DatePosted)
	VALUES("Custom CMS", "This is a basic sample of making your own custmo Content Managment System", "Learn PHP in 30 Days", NOW())
');

$sql = $db_connection->prepare('
	INSERT INTO Users(Username, Password)
	VALUES("zop", ?)
');

$sql->bindParam(1, password_hash('123', PASSWORD_DEFAULT));
$sql->execute();

header('location:index.php');

If result is false, something went wrong
if (!$result) {
	$error = $db_connection->errorInfo();
	echo 'Someting went wrong' .$error[2];
	exit();
}

?>

<h1>Installation Complete</h1>
<a href="index.php">View Your Website</a>






