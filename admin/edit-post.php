<?php

include('../database.php');
include('login-check.php');

$sql = $db_connection->prepare('
	SELECT * FROM Posts WHERE ID=?
');

$sql->bindParam(1, $_GET['id']);

$sql->execute();

$post = $sql->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
</head>
<body>
	<h1>Edit Post</h1>
	<form enctype="multipart/form-data" method="POST" action="edit-post-action.php">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
		<div class="form-row">
			<label>Title</label>
			<input name="title" value="<?php echo $post['Title']; ?>">
		</div>
		<div class="from-row">
			<label>Summary</label>
			<textarea name="summary" rows="4">
				<?php echo $post['Summary']; ?>
			</textarea>
		</div>
		<div>
			<label>Body</label>
			<textarea name="body" rows="10">
				<?php echo $post['Body']; ?>
			</textarea>
		</div>
		<div class="form-row">
			<label>Image</label>
			<input type="file" name="image">
		</div>
		<button type="submit">Update Post</button>
	</form>
</body>
</html>



