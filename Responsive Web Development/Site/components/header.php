<?php
	// Prevents this page being directly accessed through a web browser
	if(basename($_SERVER['PHP_SELF']) == "header.php")
	{
		header('Location:../index.php');
		die();
	}

	//Dynamic changes to the styles of the navigation links/icons based on
	// login status and current page
	session_start();
	$loggedIn = isset($_SESSION["user"]);
	$navLinksToUse = $loggedIn ? ["profile","basket"] : ["register","login"];

	$icons = array(
		"home" => array("assets/home.png","assets/homeHover.png"),
		"profile" => array("assets/profile.png","assets/profileHover.png"),
		"basket" => array("assets/cart.png","assets/cartHover.png"),
		"register" => array("assets/register.png","assets/registerHover.png"));

	$classes = array("home" => "links", "basketOrRegister" => "links", profile => "links", register => "links");
	switch(basename($_SERVER['PHP_SELF']))
	{
		case "index.php":
			$icons["home"][0] = "assets/homeActive.png";
			$classes["home"] = "activelink";
			break;
		case "profile.php":
		case "login.php":
			$icons["profile"][0] = "assets/profileActive.png";
			$classes["profile"] = "activelink";
			break;
		case "basket.php":
			$icons["basket"][0] = "assets/cartActive.png";
			$classes["basketOrRegister"] = "activelink";
			break;
		case "register.php":
			$icons["register"][0] = "assets/registerActive.png";
			$classes["basketOrRegister"] = "activelink";
			break;
	}
?>

<!-- Icons at low resolutions  -->
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
			<a href="<?php echo($loggedIn ? 'basket.php' : 'register.php');?>">
				<img class="img-default" src=<?php echo($loggedIn ? $icons["basket"][0] : $icons["register"][0]);?>></img>
				<img class="img-hover" src=<?php echo($loggedIn ? $icons["basket"][1] : $icons["register"][1]);?>></img>
			</a>
		</div>

		<div class="col-2 d-md-none"></div>

		<div class="col-2 d-md-none">
			<h5 class="fs-6" style="text-align: center;color: #606060; margin-bottom: -10px; ">Album of the week:</h5>
		</div>
	</div>
</div>

<!-- Text links and banner at higher resolutions  -->
<div class="container-fluid d-none d-md-block">
	<div class="row justify-content-center">

		<div class="col-3 col-md"></div>   

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['home'];?>" href="index.php">Home</a>
		</div>

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['profile'];?>" href="profile.php"><?php echo($loggedIn ? "Profile" : "Login");?></a>
		</div>

		<div class="col-2">
			<a class="nav-link text-center fs-3 <?php echo $classes['basketOrRegister'];?>" href="<?php echo($loggedIn ? 'basket.php' : 'register.php');?>"><?php echo($loggedIn ? "Basket" : "Register");?></a>
		</div>

		<div class="col-1"></div>

		<div class="col-2">
			<h5 class="fs-6 " style="text-align: center; color: #606060;">Album of the week:</h5>
		</div>

	</div>
</div>