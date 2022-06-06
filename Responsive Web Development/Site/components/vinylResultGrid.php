<?php
    // Prevents this page being directly accessed through a web browser
	if(basename($_SERVER['PHP_SELF']) == "vinylResultGrid.php")
	{
		header('Location:../search.php');
		die();
	}

    //Only allow drag/touch controls when a user is logged in
    session_start();
    if(isset($_SESSION['user']))
    {
?>

    <script>
        function drag(e)
        {
            //Extract the albumID from the id of the img element
            e.dataTransfer.setData("albumID", e.target.id.substring(10));
            e.dataTransfer.setData("albumSrc", e.target.getAttribute("src"));
        }

    </script>


    <!-- For each album returned from the query we create a card with
     a draggable album cover image, a link to see more details about
     the album and an id with the albumID from the database in it -->
<?php
    }   
    while($row = mysqli_fetch_assoc($query))
    {
    $albumID = $row["AlbumID"];
    $title = $row["Title"];
    $price = $row["Price"];
    $imageLink = $row["Image"];
?>
        <div class="col">
            <a class="links" href = "<?php echo("product.php?album=" . strval($albumID)); ?>">
                <div class="card h-100">
                    <img class="card-img-top" draggable="true" ontouchstart="drag(event)" ondragstart="drag(event)" id="albumImage<?php echo $albumID;?>"src="<?php echo($imageLink); ?>" alt="Album cover image">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $title; ?></h6>
                        <p class="card-text">£<?php echo $price; ?></p>
                    </div>
                </div>
            </a>
        </div>


    <?php
    
    }


    ?>