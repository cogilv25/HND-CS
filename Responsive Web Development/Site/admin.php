<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
    <title>MusicOnline.com - Admin</title>

    <?php
      
      // If there is no logged in user or the logged in user is not the admin
      // then redirect them to the homepage
      session_start();
      if($_SESSION["user"] != "admin")
      {
        header("Location: index.php");
      }
      
      //Connect to the database server and handle any errors if they occur
      $db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
      if ($db->connect_error)
      {
          die('Unable to connect to database [' . $db->connect_error . ']');
      }


      //Delete user if requested
      if($_GET['action'] == 'Delete')
      {

        //Get albums uploaded by the user and for each:
        //      - Find users who have set the album as their Album Of The Week and change it to NULL
        //      - delete the Album
        $getUserAlbums = mysqli_query($db, "select AlbumID from Album where UserID='{$_GET['user']}'");
        while($row = mysqli_fetch_assoc($getUserAlbums))
        {
          mysqli_query($db, "update User set AlbumOfWeek=NULL where AlbumOfWeek='{$row['AlbumID']}'");
          mysqli_query($db, "delete from Album where AlbumID='{$row['AlbumID']}'");
        }

        //Now we can delete the user
        mysqli_query($db, "delete from User where UserID='{$_GET['user']}'"); 
      }

      //Block/Unblock user if requested
      elseif($_GET['action'] == 'Block')
      {
        mysqli_query($db, "update User set Blocked=1 where UserID='{$_GET['user']}'"); 
      }
      elseif($_GET['action'] == 'Unblock')
      {
        mysqli_query($db, "update User set Blocked=0 where UserID='{$_GET['user']}'");  
      }

      //Query for single user details if editing is requested
      if($_GET['action'] == "Edit")
      {
        $query = mysqli_query($db, "select UserID, Username, Blocked from User where Username!='admin'");
      }
      else
      {
      //Otherwise query for list of all users
        $query = mysqli_query($db, "select UserID, Username, Blocked from User where Username!='admin'");
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
        <div class="col-10 col-md-6">
          <table class="table table-sm">
            <thead class="table-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
              <tbody>
                <?php
                  while($row = mysqli_fetch_assoc($query))
                  {
                ?>

                    <tr>
                      <th scope="row"><?php echo($row["UserID"]); ?></th>
                      <td><?php echo($row["Username"]); ?></td>
                      <td>
                        <div style="display: inline-block;">
                          <form class="form" style="display: inline-block;" action="" method="get">
                            <input name="action" value="Edit" hidden>
                            <input name="user" value="<?php echo $row["UserID"]; ?>" hidden>
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                          </form>
                        </div>
                        <div style="display: inline-block;">
                          <form class="form" action="" method="get">
                            <input name="action" value="<?php echo($row["Blocked"] ? "Unblock" : "Block"); ?>" hidden>
                            <input name="user" value="<?php echo $row["UserID"]; ?>" hidden>
                            <button type="submit" class="btn btn-outline-danger"><?php echo($row["Blocked"] ? "Unblock" : "Block"); ?></button>
                          </form>
                        </div>
                        <div style="display: inline-block;">
                          <form class="form" style="display: inline-block;" action="" method="get">
                            <input name="action" value="Delete" hidden>
                            <input name="user" value="<?php echo $row["UserID"]; ?>" hidden>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>

                <?php

                  }

                  $query -> close();
                  

                ?>
              </tbody>
          </table>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>


<!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php $db -> close(); ?>
  </body>

</html>