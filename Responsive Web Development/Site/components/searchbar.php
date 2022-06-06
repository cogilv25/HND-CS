<?php
	// Prevents this page being directly accessed through a web browser
	if(basename($_SERVER['PHP_SELF']) == "searchbar.php")
	{
		header('Location:../search.php');
		die();
	}

	//Get the User's album of the week if there is a user logged in, otherwise, get the admins album of the week.
	session_start();
	if(isset($_SESSION['user']))
	{
		$AOTWQ = mysqli_query($db, "select Image from User JOIN Album ON User.AlbumOfWeek=Album.AlbumID where Username='" . $_SESSION['user'] . "'");
	}
	else
	{
		$AOTWQ = mysqli_query($db, "select Image from User JOIN Album ON User.AlbumOfWeek=Album.AlbumID where Username='admin'");
	}
	$AOTW = mysqli_fetch_assoc($AOTWQ)["Image"];

	//If the admin/user doesn't have an album of the week set, then, show a big grey question mark.
	if(!isset($AOTW))
	{
		$AOTW = "assets/noAlbum.png";
	}

	//Only allow drag and touch controls if there is a user is logged in
	if(isset($_SESSION['user']))
	{
?>

<script>
	function dragOver(ev)
	{
		ev.preventDefault();
	}

	function drop(ev)
	{
		// Update the image displayed and update the users album of the week
        ev.preventDefault();
        ev.target.setAttribute("src",ev.dataTransfer.getData("albumSrc"));

        updateAlbumOfTheWeek(ev.dataTransfer.getData("albumID"));
	}

	function updateAlbumOfTheWeek(albumID)
	{
		// We are using the fetch API to asynchronosly send a Post request to another
		// php file that will update the users album of the week.
		let formData = new FormData();
        formData.append("AlbumID", albumID);
		fetch("components/uaotw.php", {method: "POST", body: formData, mode: "cors"});
	}
</script>

<?php
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
					
					<!-- Radio buttons to choose what criteria to use when searching -->
					<div class="col-12">
						Criteria: 
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


		<!-- The Album of the week display --> 
		<div class="col-2">
			<img ontouchmove="dragOver(event)" ontouchend="drop(event)" ondragover="dragOver(event)" ondrop="drop(event)" src="<?php echo($AOTW); ?>" class="img-fluid"></img>
		</div>

	</div>
</div>

