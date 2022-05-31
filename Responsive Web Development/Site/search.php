<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
    <title>MusicOnline.com - Register</title>

    <?php
      if(isset($_GET["searchString"]))
      {
        $error = "";
        $phrase = filter_var($_GET["searchString"], FILTER_SANITIZE_STRING);
        $criteria = $_GET["searchType"];
        if($criteria === "Title" || $criteria === "Artist" || $criteria === "Genre")
        {
          $db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
          if ($db->connect_error)
          {
              die('Unable to connect to database [' . $db->connect_error . ']');
          }


          // Prepare query
          echo($criteria);
          $query = $db -> prepare("select AlbumID,Title,Price,Image from Album where " . $criteria . " like '%" . $phrase . "%'");
          $query -> bind_param("s",$phrase);

          //$query = $db -> prepare("select AlbumID,Title,Price,Image from Album");

          // execute
          $query -> bind_result($albumID,$title,$price,$imageLink);
          $query -> execute();
          $query -> fetch();


          $query -> close();
          $db -> close();
        }
        else
        {
          $error = "Search type not supported!";
        }
      }
    ?>

  </head>

  <body style="background-color: #FFFFFF;">
    <?php
    
      require 'components/header.php';
      require 'components/searchbar.php';

    ?>
    <div class="container-fluid">
	    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
          <?php
            if(isset($_GET["searchString"]))
            {
              require 'components/vinylResultGrid.php';
            }
          ?>
        </div>
      </div>
    </div>


  </body>
</html>