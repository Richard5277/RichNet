
<?php

include('database.php');

$sql = $db_connection->prepare('
	SELECT * FROM Posts WHERE ID=?
');
$sql->bindParam(1, $_GET['id']);

$sql->execute();

//Get first row from results
$row = $sql->fetch();

// No post with specified id
if (!$row) {
	http_response_code(404);
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MY CMS: <?php echo $row['Title']; ?></title>
</head>
<body>
	<h1><?php echo $row['Title']; ?></h1>
	<p><?php echo $row['Body']; ?></p>
	<?php if (!empty($row['Image'])): ?>
		<img src="uploads/<?php echo $row['Image']; ?>">
	<?php endif; ?>
</body>
</html>







