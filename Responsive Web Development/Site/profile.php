<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
    <title>MusicOnline.com - Profile</title>

	
	</head>

  <body style="background-color: #FFFFFF;">

  	<?php
  	// Check if a user is logged in, if they are not logged in redirect to the login page,
  	// if the user is the admin then redirect to the admin page
		session_start();
		if(isset($_SESSION["user"]))
		{
			$username = $_SESSION["user"];
			if($username == "admin")
			{
				header("Location: admin.php");
			}
		}
		else
		{
			header("Location: login.php");
		}


		//Connect to the database server and handle any errors if they occur
    $db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
  	if ($db->connect_error)
    {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
		

    	require 'components/header.php';
    	require 'components/searchbar.php';
  	?>


  	<!-- Welcome message and logout link -->
  	<div class="container-fluid">
	  	<div class="row justify-content-center">
		  	<div class="col-6 col-md-3 text-center">
		  		<h3>Welcome to your profile <?php echo($username);?>!</h3>
		  	</div>
		  	<div class="col-6 col-md-3 text-center">
		  		<a href="logout.php">Logout</a>
	  		</div>
	  	</div>
  	</div>


  	<?php $db -> close(); ?>

<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>