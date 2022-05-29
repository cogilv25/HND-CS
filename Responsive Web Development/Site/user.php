<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
    <title>MusicOnline.com - User</title>

	
	</head>

  <body style="background-color: #FFFFFF;">

  	<?php
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

		

    	require 'components/header.php';
  	?>

  	<div class="container-fluid">
	  	<div class="row justify-content-center">
		  	<div class="col-6 col-md-3 text-center">
		  		Welcome to your profile <?php echo($username);?>!
		  	</div>
		  	<div class="col-6 col-md-3 text-center">
		  		<a href="logout.php">Logout</a>
	  		</div>
	  	</div>
  	</div>

<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>