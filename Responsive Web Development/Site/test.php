<!DOCTYPE html>
<?php

$db = new mysqli("comp-server.uhi.ac.uk","SH21010093","21010093","SH21010093");
if ($db->connect_error)
{
    $errorQ = "Unable to connect to database";
    die('Unable to connect to database [' . $db->connect_error . ']');
}
else
{
    $username = "John";
    $password = password_hash("Orangatan",PASSWORD_DEFAULT);

    $query1 = $db -> prepare("select count(*) from User where Username = ?");
    $query1 -> bind_param("s",$username);

    $query1 -> execute();
    $query1 -> bind_result($qResult);
    $query1 -> fetch();
    $query1 -> fetch(); // Removing this line breaks the page
    
    if($qResult > 0)
    {
        $errorQ = "User already exists";
    }
    else
    {
        $query2 = $db -> prepare("insert into User (Username, Password) values (?,?)");
        $query2 -> bind_param("ss",$username,$password);

        $query2 -> execute();
        $query2 -> close();

        $query1 -> execute();
        $query1 -> bind_result($qResult);
        $query1 -> fetch();
        $query1 -> close();
        if($qResult < 1)
        {
            $errorQ = "Unexpected error - user not created";
        }
    }

}

$test = $_SESSION["logged_in"] ? ["profile","basket"] : ["register","login"];
echo($test[0] . ", " . $test[1] . "<br><br>Error: " . $errorQ .
 "<br><br>Result: " . $qResult);
 $query1 -> close();
 $db -> close();
?>