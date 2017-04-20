<?php

include('login-check.php');

session_start();
if(empty($_SESSION['is_logged_in'])){
	header('location:login.php');
	exit();
}

include('../database.php');


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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/adminPage.css">
	</head>
	<body>
	<div class="adminMain container">

		<div class="col-sm-3 sideMenu">
			<div class="title">
				<h1>Content Administration</h1>
				<div class="separator"></div>
			</div>
			<div class="menuLink">
				<span><a href="add-post.php">Add New Post</a><br></span>
				<span><a href="log-out.php">Logout</a><br></span>
				<span><a href="../index.php">Back To Website</a></span>
			</div>
		</div>
		
		<div class="col-sm-9 adminTable">
			<div class="tableContent">
				<table >
					<thead>
						<th class="col-sm-4">Title</th>
						<th class="col-sm-4">Date Posted</th>
						<th colspan="2" class="col-sm-4">Actions</th>
					</thead>
					<tbody>
					<?php while ($row = $result->fetch()): ?>
						<tr class="singleProject">
							<td class="col-sm-3 "><?php echo $row['Title']; ?></td>
							<td class="col-sm-3"><?php echo $row['DatePosted']; ?></td>
							<td class="col-sm-1 adminEdit"><a href="edit-post.php?id=<?php echo $row['ID']; ?>">Edit</a></td>
							<td class="col-sm-1 adminDelete"><a href="delete-post-action.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
							<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" >
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	</body>
</html>


