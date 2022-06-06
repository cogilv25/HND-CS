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

    //Connect to the database server and handle any errors if they occur
    $db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
  	if ($db->connect_error)
    {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    // If a username has been posted to the page then,
    // attempt to create a new user in the database
  	if (isset($_POST['username']))
  	{
      //Sanitize the user input posted to the page
  		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
  		$password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
		

  		// Prepare 2 queries:
      //    query1 - Checks if there is a user with the username specified
      //    query2 - Inserts a new user into the database
  		$query1 = $db -> prepare("select count(*) from User where Username = ?");
      $query1 -> bind_param("s",$username);
      $query2 = $db -> prepare("insert into User (Username, Password, Address) values (?,?,?)");
      $query2 -> bind_param("sss",$username,$password,$address);

  		// Check if the user already exists by executing query1
  		$query1 -> execute();
  		$query1 -> bind_result($exists);
  		$query1 -> fetch();
  		$query1 -> fetch(); // Extra fetch required to solve a bug

  		if($exists == 0)
      {
        // Create the new user by executing query2
  			$query2 -> execute();
  			$query1 -> execute();
        
        // Check that the user was created successfully,
        // if not display an error message
  			$query1 -> bind_result($exists);
  			$query1 -> fetch();
  			if($exists == 0)
  			{
  				$error = "Unexpected error - user not created";
  			}
        else
        {
          // Finally log the user in and redirect them to their profile
          session_start();
          $_SESSION['user'] = $username;
          header("Location: profile.php");
        }
  		}
  		else
  		{
  			$error = "Username already exists";
  		}

      $query1 -> close();
      $query2 -> close();
  	} 
  	?>

  </head>

  <body style="background-color: #FFFFFF;">


  <?php
    require 'components/header.php';
    require 'components/searchbar.php';
  ?>


  <!-- Registration Form -->
  <div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6">
      <h3>Registration Form</h3>
      <form class="row g-3 needs-validation" novalidate action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post">
        <div class="col-md-6">
          <label for="validationCustom01" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="validationCustom01" required>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="invalid-feedback">
            Please choose a valid username.
          </div>
        </div>

        <div class="col-md-6">
          <label for="validationCustom02" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="validationCustom02" required>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="invalid-feedback">
            Please select a valid password.
          </div>
        </div>

        <div class="col-md-12">
          <label for="validationCustom03" class="form-label">Address</label>
          <textarea rows="3" class="form-control" name="address" id="validationCustom03" required></textarea>
          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="invalid-feedback">
            Please enter a valid address.
          </div>
        </div>

        <div class="col-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
            <label class="form-check-label normalstuff" for="invalidCheck">
              Are you over 18?
            </label>
            <div class="invalid-feedback">
              You must be over 18 to register.
            </div>
          </div>
        </div>

        <div class="col-6">
          <button class="btn btn-primary float-md-end" id="submitButton" type="submit">Register User</button>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>

<?php

// Display any errors encountered
if(isset($_POST['username']))
{
  ?>
  <div class="row justify-content-center">
    <div class="col-6"><?php echo($error);?></div>
  </div>
  <?php
}
?>

</div>

<script>


  function capitaliseValue()
  {
    this.value = this.value.toUpperCase();
  }


  // Automatically capitalise the address textbox when the user is typing
  let addressInput = document.getElementById('validationCustom03');
  addressInput.onkeyup = capitaliseValue;

  // Bootstrap Form Validation
  (function () {
  'use strict'

  // Fetch all the forms we want to apply Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
    })
  })()

</script>


    <?php $db -> close(); ?>

<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>