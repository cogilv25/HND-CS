<!doctype html>
<?php
  $componentName = "boilerplateTop.php";
  require_once "component.php";
  // Get page name, capitalise first letter and remove (.php)
  // beware this relies on the page names being standard ASCII (NOT UTF-8, etc)
  $pageName = basename($_SERVER['PHP_SELF']);
  $pageName = ucfirst($pageName);
  $pageName = substr($pageName,0,strlen($pageName)-4);
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link href="style.css" rel="stylesheet"/>
<?php 
      if($pageName != "Index")
      {
?>
        <title>MusicOnline.com - <?php echo $pageName ?></title>
<?php
      }
      else
      {
?>
        <title>MusicOnline.com</title>
<?php
      }
?>


  </head>

  <body style="background-color: #FFFFFF;>

  <!!-------------------------------------
    require 'components/header.php';
    require 'components/searchbar.php';
    require 'components/boilerplateBottom.php';
  ?>