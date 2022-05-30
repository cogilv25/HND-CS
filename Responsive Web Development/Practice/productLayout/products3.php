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
					  <a class="nav-link" href="products2.php">Products - Responsive table</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link active" href="products3.php">Products - DIV</a>
					</li>
				  </ul>
			</div>
			
		</div> 	<!-- end of the row -->
	</div>		<!-- end of the container -->
	 
    <br>
    <div class="container-xl">
		<div class="row">
            <div class="col">
                <p class="text-muted"> Home > products3.php </p>
                
                <h1 class="display-6">
                Bootstrap repeating DIV + cards
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
        
        <div class="row justify-content-center">
        
            <?php while ($row=mysqli_fetch_assoc($result1))
                {
                ?>

                <form name="orderForm" method="post" action="somepage.php">
            
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Stock No: <?php echo $row['equipID'] ?></h5><input type="hidden" name="equipID" value="<?php echo $row['equipID'] ?>">
                                    <span class="card"><img class="img-fluid card-img-top" src="<?php echo $row['image'] ?>" alt="No image yet"></span>
                                
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $row['description'] ?></li>
                                    <li class="list-group-item">Quantity: <select name="qty" id="qty">
                                        <option value="0" selected="selected">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    </li>
                                
                                </ul>
                            <p align="center"><button type="submit" class="btn btn-primary">Order</button>
                            </p>
                            </div>
                        </div>
                    </div>
                    <p> </p>	
            
                </form>

                <?php } ?>

        </div> <!-- end row -->

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