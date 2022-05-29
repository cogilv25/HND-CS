<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
    <title>MusicOnline.com - Register</title>

    <?php
  	//Functionality
  	if (isset($_POST['username']))
  	{
  		$error = "";
  		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  		$db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
  		if ($db->connect_error)
  		{
    			die('Unable to connect to database [' . $db->connect_error . ']');
  		}


  		// Prepare queries
  		$query = $db -> prepare("select Password from User where Username = ?");
      $query -> bind_param("s",$username);

  		// Check if the user already exists
      $query -> bind_result($realPass);
  		$query -> execute();
  		$query -> fetch();
      $query -> close();
      $db -> close();

  		if(password_verify($password, $realPass))
      {
        session_start();
        $_SESSION['user'] = $username;
        $error = "Logged in!";
        header("Location: user.php");
  		}
  		else
  		{
  			$error = "Incorrect credentials";
  		}
  	} 
  	?>

  </head>

  <body style="background-color: #FFFFFF;">


  <?php
    require 'components/header.php';
  ?>

  <div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6">
      <form class="row g-3 needs-validation" novalidate action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post">
        <div class="col-md-6">
          <label for="validationCustom01" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="validationCustom01" required>
          <div class="invalid-feedback">
            Please enter your username.
          </div>
        </div>

        <div class="col-md-6">
          <label for="validationCustom02" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="validationCustom02" required>
          <div class="invalid-feedback">
            Please enter your password.
          </div>
        </div>
        <div class="col-6"></div>
        <div class="col-6">
          <button class="btn btn-primary float-md-end" id="submitButton" type="submit">Log In</button>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>


  <div class="row justify-content-center">
    <div class="col-6"><?php echo($error);?></div>
  </div>

</div>


<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>