<?php

include('../database.php');
include('login-check.php');

$sql = $db_connection->prepare('
	DELETE FROM Posts WHERE ID=?
');

$sql->bindParam(1, $_GET['id']);

$post = $sql->fetch();

if (!empty($post['Image'])) {
	//delete image from uploads
	unlink('../uploads/' . $post['Image']);
}

$sql->execute();

?>

<h1>Post Deleted</h1>
<a href="index.php">Post Added! Go Back to Website</a>