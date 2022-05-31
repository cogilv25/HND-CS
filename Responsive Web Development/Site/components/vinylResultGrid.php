<?php
	if(basename($_SERVER['PHP_SELF']) == "header.php")
	{
		header('Location:../404.php');
		die();
	}

    //while()
    //{?>

        <a href = "<?php echo("album.php?album=" . strval($albumID)); ?>">
            <div class="card col-12 col-md-6 col-lg-4">
                <img class="card-img-top" src="<?php echo($imageLink); ?>" alt="Album cover image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo($title); ?></h5>
                    <p class="card-text">£<?php echo($price); ?></p>
                </div>
            </div>
        </a>


    <?php//}


    ?>