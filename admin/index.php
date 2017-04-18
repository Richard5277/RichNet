<?php

include('login-check.php');

session_start();
if(empty($_SESSION['is_logged_in'])){
	header('location:login.php');
	exit();
}

include('../database.php');

// load all the posts

// load our posts from database
$result = $db_connection->query('
	SELECT * FROM Posts
');

if (!result){
	$error = $db_connection->errorInfo();
	if ($error[0] == '42502') {
		header('location:install.php'); // redirect to another file
		exit();
	}
}

?>

<!doctype html>
<html>
	<head>
		<title>MyCMS Administration</title>
	</head>
	<body>
		<h1>Content Administration</h1>
		<table style="border: 1px solid black">
			<thead>
				<th>Title</th>
				<th>Date Posted</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch()): ?>
					<tr>
						<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" > 
						<td><?php echo $row['Title']; ?></td>
						<td><?php echo $row['DatePosted']; ?></td>
						<td><a href="edit-post.php?id=<?php echo $row['ID']; ?>">Edit</a></td>
						<td><a href="delete-post-action.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
		<a href="add-post.php">Add New Post</a><br>
		<a href="log-out.php">Logout</a><br>
		<a href="../index.php">Back To Website</a>
	</body>
</html>


