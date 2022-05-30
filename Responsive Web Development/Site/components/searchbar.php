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
				<form class="col-12 input-group gap-2" action="search.php" method="get">
					<input class="form-control" name="searchString" placeholder="Looking for something..?" value="<?php echo($_GET["searchString"]); ?>" ></input>
					<button class="btn btn-outline-secondary" type="submit">Search</button>
					<div class="col-12">
						Search By: 
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="searchType" id="inlineRadio1" value="Title" <?php echo((!isset($_GET["searchType"]) || $_GET["searchType"] === "Title") ? "checked" : ""); ?>>
							<label class="form-check-label" for="inlineRadio1">Title</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="searchType" id="inlineRadio2" value="Artist" <?php echo($_GET["searchType"]=="Artist" ? "checked" : ""); ?>>
							<label class="form-check-label" for="inlineRadio2">Artist</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="searchType" id="inlineRadio3" value="Genre" <?php echo($_GET["searchType"]=="Genre" ? "checked" : ""); ?>>
							<label class="form-check-label" for="inlineRadio3">Genre</label>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="col-2">
			<img src="assets/joy_division_unknown_pleasures.png" class="img-fluid"></img>
		</div>

	</div>
</div>