<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Euans Bootstrap Demo</title>
  </head>

  <body>
    <!-- PAGE SECURITY IS HERE -->
    <?php 
    //Security check - only allow Bob access
        
    session_start();
    if (!isset($_SESSION['secret'])){ 
        header('location: index.html');
        exit;
      }
    ?>
    
	<div class="container-xl">
		<div class="row" align="center">
			
			<div class="col" align="center">
				<img src="images/banner.jpg" height="150px" class="img-fluid" alt="banner graphic">
			</div>
			
		</div>
	</div>
	
	<br>
  
	<div class="container-xl">
		<div class="row">
						
			<div class="col-12" align="center">

        <ul class="nav nav-tabs">
					<li class="nav-item">
					  <a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link active" href="secret.php">Secret Page</a>
                    </li>
                    <li class="nav-item">
					  <a class="nav-link " href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
			
		</div> 	
	</div>		
	 
    <br>
    <div class="container-xl">
		<div class="row">
            <div class="col">
                <p class="text-muted"> Home > secret.php </p>
                
                <h1 class="display-6">
                This is the Secret page.  Well done you must have logged in ;)
                <?php echo $_SESSION['secret'];?>
                </h1>    
            </div>
        </div>
    </div>
    <br>


	<div class="container-xl">
    
       <img src="images/secret.jpg" class="img-fluid">

	</div> 		<!-- close container -->

	
	<br><br>
	
	<!-- Here's a footer -->
	<footer>
		<div class="alert alert-primary" role="alert">
		  <h4 class="alert-heading">Footer</h4>
		  <p>&copy No copyright - use as you see fit :)</p>
		  <hr>
		  <p class="mb-0" align="right">Euans wee Bootstrap tutorial</p>
		</div>
	</footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>