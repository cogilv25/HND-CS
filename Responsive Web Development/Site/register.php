<!doctype html>
<?php
  // Get page name, capitalise first letter and remove (.php)
  // beware this relies on the page names being standard ASCII (NOT UTF-8, etc)
  $pageName = basename($_SERVER['PHP_SELF']);
  $pageName = ucfirst($pageName);
  $pageName = substr($pageName,0,strlen($pageName)-4);
?>
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

  <body style="background-color: #FFFFFF;>


  <?php
  	// Layout
    require 'components/header.php';
    require 'components/registrationForm.php';
    require 'components/boilerplateBottom.php';
    if($wasaerror != "")
    {
    	echo $wasaerror;
    }
  ?>