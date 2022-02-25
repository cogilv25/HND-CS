<?php
	$componentName = "header.php";
	require_once "component.php";

	
	$navLinksToUse = $_SESSION["logged_in"] ? "basket" : "register";

	$icons = array(
		"home" => array("assets/home.png","assets/homeHover.png"),
		"profile" => array("assets/profile.png","assets/profileHover.png"),
		"basket" => array("assets/cart.png","assets/cartHover.png"));

	$classes = array("home" => "links", "basket" => "links", profile => "links");
	switch(basename($_SERVER['PHP_SELF']))
	{
		case "index.php":
			$icons["home"][0] = "assets/homeActive.png";
			$classes["home"] = "activelink";
			break;
		case "profile.php":
			$icons["profile"][0] = "assets/profileActive.png";
			$classes["profile"] = "activelink";
			break;
		case "basket.php":
			$icons["basket"][0] = "assets/cartActive.png";
			$classes["basket"] = "activelink";
			break;
	}
?>


<div class="container-fluid">
	<div class="row justify-content-center">

		<div class="col-2 col-md-10">
			<a href="index">
				<div class="container">
					<img class="col d-md-none" style="margin-left: -25px; " src="assets/logo.png"></img>
					<img src="assets/Company Banner.png" class="img-fluid d-none d-md-block"></img>
				</div>
			</a>
		</div>

		<div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
			<a href="index">
				<img class="img-default" src=<?php echo $icons["home"][0];?>></img>
				<img class="img-hover" src=<?php echo $icons["home"][1];?>></img>
			</a>
		</div>

		<div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
			<a href="profile.php">
				<img class="img-default" src=<?php echo $icons["profile"][0];?>></img>
				<img class="img-hover" src=<?php echo $icons["profile"][1];?>></img>
			</a>
		</div>

		<div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
			<a href="basket.php">
				<img class="img-default" src=<?php echo $icons["basket"][0];?>></img>
				<img class="img-hover" src=<?php echo $icons["basket"][1];?>></img>
			</a>
		</div>

		<div class="col-2 d-md-none"></div>

		<div class="col-2 d-md-none">
			<h5 class="fs-6" style="text-align: center;color: #606060; margin-bottom: -10px; ">Album of the week:</h5>
		</div>
	</div>
</div>


<div class="container-fluid d-none d-md-block">
	<div class="row justify-content-center">

		<div class="col-3 col-md"></div>   

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['home'];?>" href="index.php">Home</a>
		</div>

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['profile'];?>" href="profile.php">Profile</a>
		</div>

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['basket'];?>" href="basket.php">Basket</a>
		</div>

		<div class="col-1"></div>

		<div class="col-2">
			<h5 class="fs-6 " style="text-align: center; color: #606060;">Album of the week:</h5>
		</div>

	</div>
</div>