
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
	<link rel="stylesheet" type="text/css" href="css/singlePost.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section>
	<div class="topNav">
		<span class="homeLink">
			<a href="index.php"><i style="width: 24px; height: auto; font-size: 1.8rem; margin-top: 6px;" class="fa fa-home" aria-hidden="true"></i>Home</a>
		</span>
	</div>
</section>
<section class="content">
	<h1><?php echo $row['Title']; ?></h1>
	<p><?php echo $row['Body']; ?></p>
	<div class="imgContainer">
		<?php if (!empty($row['Image'])): ?>
			<img src="uploads/<?php echo $row['Image']; ?>" class="img-responsive">
		<?php endif; ?>
	</div>
</section>
<script type="text/javascript" src="js/post.js"></script>
</body>
</html>







