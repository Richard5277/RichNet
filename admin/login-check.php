<?php

include('../database.php');

$sql = $db_connection->prepare('
	SELECT * FROM Users WHERE Username=?
');

$sql->bindParam(1, $_POST['username']);

$sql->execute();

$user = $sql->fetch();

if($user){
	//found user
	if (password_verify($_POST['password'], $user['Password'])){
		session_start();
		$_SESSION['is_logged_in'] = TRUE;
		header('location:index.php');
		exit();
	}
} else {
	//no such user
	// echo "<h1>No Such User Founded</h1>";
}

?>