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
  		$wasaerror = ""
  		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  		$password = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
		if ($db->connect_error)
		{
  			die('Unable to connect to database ['.$db->connect_error.']');
		}


		// Prepare queries
		$query1 = $db -> prepare("select count(*) from `User` where `Username` = ?");
		$query1 -> bind_param("s",$username);
		$query2 = $db -> prepare("insert into `User` (`Username`,`Password`) values (?,?)");
		$query2 -> bind_param("ss",$username,$password);

		// Execute queries
		$query1 -> execute();
		$query1 -> bind_result($exists);
		$query1 -> fetch();
		if($exists == 0)
		{
			$query2 -> execute();
			// Check record exists
			$query1 -> execute();
			$query1 -> bind_result($exists);
			$query1 -> fetch();
			if($exists == 0)
			{
				$wasaerror = "Record was inserted but doesn't exist";
			}
		}
		else
		{
			$wasaerror = "Username already exists"
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
          <button class="btn btn-primary float-md-end" type="submit">Register User</button>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>


<!-- Form validation -->
<script>
  (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
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
<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>