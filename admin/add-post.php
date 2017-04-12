<?php

include('../database.php');
include('login-check.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Post</title>
</head>
<body>
	<h1>Add New Post</h1>
	<form enctype="multipart/form-data" method="post" action="add-post-action.php">
		<div class="form-row">
			<label>Title</label>
			<input name="title">
		</div>
		<div class="form-row">
			<label>Summary</label>
			<textarea name="summary" rows="4"></textarea>
		</div>
		<div>
			<label>Body</label>
			<textarea name="body" rows="10"></textarea>
		</div>
		<div class="form-row">
			<label>Image</label>
			<input type="file" name="image">
		</div>
		<button type="submit">Add Post</button>
	</form>
</body>
</html>



