<?php

include('../database.php');
include('login-check.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Post</title>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/addPost.css">
</head>
<body>
	<h1 class="title">Add New Post</h1>
	<div class="container">
		<form enctype="multipart/form-data" method="post" action="add-post-action.php">
			<label class="singleLabel">Title</label>
			<input name="title" class="inputSection">
			<label class="singleLabel">Summary</label>
			<textarea name="summary" rows="4" class="inputSection"></textarea>
			<label class="singleLabel">Body</label>
			<textarea name="body" rows="10" class="inputSection"></textarea>
			<label class="singleLabel">Image</label>
			<input type="file" name="image">
			<div class="submitBT">
			<button type="submit"><i class="fa fa-plus-square" aria-hidden="true" style="padding-right: 10px;"></i>Add Post</button>
			</div>
		</form>
		<a href="index.php"><div class="cancelBT" ><i class="fa fa-ban" aria-hidden="true" style="padding-right: 10px;"></i>Cancel</div></a>
	</div>
</body>
</html>



