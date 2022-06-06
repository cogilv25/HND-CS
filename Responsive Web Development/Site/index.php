<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>

    <title>MusicOnline.com</title>

    <?php

      // Connect to the database server and handle any errors if they occur
      $db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
      if ($db->connect_error)
      {
          die('Unable to connect to database [' . $db->connect_error . ']');
      }

      // Get details about all albums in the database for the vinylResultGrid to display.
      $query = mysqli_query($db, "select AlbumID,Title,Price,Image from Album");
      
    ?>

  </head>

  <body style="background-color: #FFFFFF;">

  <?php

    require 'components/header.php';
    require 'components/searchbar.php';
  ?>


    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-10 col-md-6 row row-cols-1 row-cols-md-2 row-cols-xl-3">
          <?php
            require 'components/vinylResultGrid.php';

            // We don't need the query any more after vinylResultGrid
            // has finished with it
            $query -> close();
          ?>
        </div>
      </div>
    </div>




  <?php $db -> close(); ?>
<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>

</html>