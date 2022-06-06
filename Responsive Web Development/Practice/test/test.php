<!DOCTYPE html>
<html>
<?php 
    session_start();
    $_SESSION["user"] = "Rawr";
?>
    <body>
        <h1 id="Title">HI <?php echo($_SESSION["user"]); ?>
        </h1>
    </body>

    <script>
        let formdata = new FormData();
        formdata.append("AlbumID", "1");
        formdata.append("Username", "John");

        fetch("fetchdata.php",{method: "POST", body: formdata});
    </script>
</html>