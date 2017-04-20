<?php

include('database.php');
include('thumbnail.php');
// load our posts from database
$result = $db_connection->query('
	SELECT * FROM Posts
');

// check for result
if (!$result){
	$error = $db_connection->errorInfo();
	if ($error[0] == '42502') {
		header('location:install.php'); // redirect to another file
		exit();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RICHNET</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="myCMS">
    <meta name="author" content="Richard">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body id="page-top">
		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
			<a class="navbar-brand" href="#page-top">RICHNET</a>
			<!-- <a class="userLogin" href="admin/log-out.php">LOGOUT</a> -->
			<a class="userLogin" href="admin/index.php">ADMIN</a>
		</nav>
		<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Build Your Digital Store</h1>
                <hr>
                <p>RICHNET is the way to build your digital empire!</p>
                <a href="#services" class="btn btn-primary btn-xl page-scroll richbtn">Find Out More</a>
            </div>
        </div>
    </header>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Build Your Dream</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Quality Service</h3>
                        <p class="text-muted">Our service will fullfill your dream!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Ready to Launch</h3>
                        <p class="text-muted">You can use this framework as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Share Your Passion</h3>
                        <p class="text-muted">Shre your digital inspirations here with millions of users!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
		<div class="container-fluid">
			<div class="row no-gutter popup-gallery">	
				<?php while($row = $result->fetch()): ?>
					<div class="col-lg-4 col-sm-6">
						<a href="post.php?id=<?php echo $row['ID']; ?>" class="portfolio-box">
							<img src="../uploads/<?php echo $row['Image']; ?>" class="img-responsive" alt="image">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
	                                <div class="project-category text-faded">
	                                    <?php echo $row['Title']; ?>
	                                </div>
	                                <div class="project-name">
	                                    <?php echo $row['Summary']; ?>
	                                </div>
                            	</div>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div> 
		</section>

		<aside class="bg-dark">
	        <div class="container text-center">
	            <div class="call-to-action">
	                <h2>Register For 10 Days Free Tryout !</h2>
	            </div>
	        </div>
	    </aside>

	    <section id="contact">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 col-lg-offset-2 text-center">
	                    <h2 class="section-heading">Let's Get In Touch!</h2>
	                    <hr class="primary">
	                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
	                </div>
	                <div class="col-lg-4 col-lg-offset-2 text-center">
	                    <i class="fa fa-phone fa-3x sr-contact"></i>
	                    <p>628-8857-6789</p>
	                </div>
	                <div class="col-lg-4 text-center">
	                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
	                    <p><a href="#">richnet@gmail.com</a></p>
	                </div>
	            </div>
	        </div>
	    </section>
	</body>
</html>


