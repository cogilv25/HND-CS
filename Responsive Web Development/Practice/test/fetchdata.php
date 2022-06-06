<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		$db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
		if (!$db->connect_error)
		{
  			$username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
  			$newAOTW = filter_var($_POST['AlbumID'],FILTER_SANITIZE_NUMBER_INT);

  			//Prepare Query
  			$query = $db -> prepare("UPDATE User SET AlbumOfWeek=? WHERE Username=?");
  			$query -> bind_param("is",$newAOTW,$username);

	  		// Execute
	  		$query -> execute();
	      	$query -> close();

		}

		$db -> close();
	}
?>