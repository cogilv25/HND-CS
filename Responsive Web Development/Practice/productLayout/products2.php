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
				<!-- Navigation -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
					  <a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="products.html">Products - no Db</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="products1.php">Products - table</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link active" href="products2.php">Products - Responsive table</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="products3.php">Products - DIV</a>
					</li>
				  </ul>
			</div>
			
		</div> 	<!-- end of the row -->
	</div>		<!-- end of the container -->
	 
    <br>
    <div class="container-xl">
		<div class="row">
            <div class="col">
                <p class="text-muted"> Home > products2.php </p>
                
                <h1 class="display-6">
                Responsive HTML Bootstrap Table with repeating rows
                </h1>    
            </div>
        </div>
    </div>
    <br>


	<div class="container-xl">
    
        <?php
            include 'db.php';

            $query1="select * from equipment";
            $result1=mysqli_query($db,$query1);
    
        ?>
        
        <table class="table"><!-- try class table table-striped  -->
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <?php while ($row=mysqli_fetch_assoc($result1))
                {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['equipID'] ?></th>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['make'] ?></td>
                        <td><?php echo $row['model'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['qtyInStock'] ?></td>
                        <td><img src="<?php echo $row['image'] ?>" class="img-fluid"></td>
                    </tr>
                <?php
                }
                ?>

        </table>

	</div> 		<!-- close container -->

	
	<!-- A few blank lines -->
	<br><br>
	
	<!-- Here's a footer -->
	<!-- Note no container or row divs, so be default full width of screen -->
	<footer>
		<div class="alert alert-primary" role="alert">
		  <h4 class="alert-heading">Footer</h4>
		  <p>&copy No copyright - use as you see fit :)</p>
		  <hr>
		  <p class="mb-0" align="right">Euans wee Bootstrap tutorial</p>
		</div>
	</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>