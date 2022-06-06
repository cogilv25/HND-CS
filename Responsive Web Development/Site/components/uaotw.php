<?php
	
	//Update the currently logged in user's album of the week
	session_start();
	if(isset($_SESSION['user']))
	{
		$db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
		if (!$db->connect_error)
		{
  			$newAOTW = filter_var($_POST['AlbumID'],FILTER_SANITIZE_NUMBER_INT);


  			//Prepare Query
  			$query = $db -> prepare("UPDATE User SET AlbumOfWeek=? WHERE Username=?");
  			$query -> bind_param("is",$newAOTW,$_SESSION['user']);

	  		// Execute
	  		$query -> execute();
	      	$query -> close();
			
		}

		$db -> close();
	}
?>