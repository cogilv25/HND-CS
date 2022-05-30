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


          // Prepare queries
          $query = $db -> prepare("select Title,Price,Image from Album where ? like %?%");
          $query -> bind_param("ss",$criteria, $phrase);

          // Check if the user already exists
          $query -> bind_result($title,$price,$imageLink);
          $query -> execute();
          $query -> fetch();


          $query -> close();
          $db -> close();
        else
        {
          $error = "Search type not supported!";
        }
      }
    ?>

  </head>

  <body style="background-color: #FFFFFF;">
    <?php
      $testthing = 'components/header.php';
      require $testthing;
      require 'components/searchbar.php';
    ?>

  </body>
</html>