<?php
	if(basename($_SERVER['PHP_SELF']) == "header.php")
	{
		header('Location:../404.php');
		die();
	}
?>


<div class="container-fluid">
	<div class="row justify-content-center">

		<div class="col-md-3 col-lg-3"></div>

		<div class="col-10 col-md-7 col-lg-7" style="padding-top: 5px">
			<div class="row justify-content-left">
				<form class="input-group gap-2">
					<input class="form-control" placeholder="Looking for something..?"></input>
					<button class="btn btn-outline-secondary" type="submit">Search</button>
				</form>
			</div>
		</div>

		<div class="col-2">
			<img src="assets/joy_division_unknown_pleasures.png" class="img-fluid"></img>
		</div>

	</div>
</div>