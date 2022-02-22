<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>MusicOnline.com</title>

    <style>
      .logocontainer img.img-hover, .logocontainer:hover img.img-default
      {
        display: none;
      }

      .logocontainer:hover img.img-hover
      {
        display: block;
      }

      .links
      {
        color: #606060;
      }

      .activelink
      {
        color: #A0A0A0;
        text-decoration-line: underline;
      }

      .links:hover, .activelink:hover
      {
        color: #808080;
      }

    </style>

  </head>
  <body style="background-color: #282828;">
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-2 col-md-10">
              <a href="https://comp-server.uhi.ac.uk/~21010093/bootstrap/"><div class="container">
                  <img class="col d-md-none" style="margin-left: -25px; " src="logo.png"></img>
                  <img src="Company Banner.png" class="img-fluid d-none d-md-block">
              </div></a>
          </div>
          <div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
            <a href="https://comp-server.uhi.ac.uk/~21010093/bootstrap/">
                <img class="img-default" src="home.png"></img>
                <img class="img-hover" src="homeHover.png"></img>
            </a>
          </div>
          <div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
            <a href="https://comp-server.uhi.ac.uk/~21010093/bootstrap/profile.html">
                <img class="img-default" src="profileActive.png"></img>
                <img class="img-hover" src="profileHover.png"></img>
            </a>
          </div>
          <div class="col-2 d-md-none logocontainer" style="color: #FFFFFF">
            <a href="https://comp-server.uhi.ac.uk/~21010093/bootstrap/basket.html">
                <img class="img-default" src="cart.png"></img>
                <img class="img-hover" src="cartHover.png"></img>
            </a>
          </div>
          <div class="col-2 d-md-none"></div>
          <div class="col-2 d-md-none">
              <h5 class="fs-6" style="text-align: center;color: #606060; margin-bottom: -10px; ">Album of the week:</h5>
          </div>
      </div>
  </div>
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-3 col-md d-none d-md-block"></div>      
            <div class="col-2 d-none d-md-block">
              <a class="nav-link text-center fs-3 links" href="#">Home</a>
             </div>
            <div class="col-2 d-none d-md-block">
              <a class="nav-link text-center fs-3 activelink" href="#">Profile</a>
            </div>
            <div class="col-2 d-none d-md-block">
              <a class="nav-link text-center fs-3 links" href="#">Basket</a>
            </div>
            <div class="col-10 d-md-none" style="padding-top: 5px">
                <div class="row justify-content-left">
                  <form class="input-group gap-2">
                        <input class="form-control" placeholder="Looking for something..?">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                  </form>
                </div>
            </div>
            <div class="col-2 d-md-none" style="text-align: center; color:#FFFFFF">
              <img src="joy_division_unknown_pleasures.png" class="img-fluid"></img>
            </div>
            <div class="col-1 col-md d-none d-md-block"></div>
            <div class="col-2 col-md d-none d-md-block">
              <h5 class="fs-6 " style="text-align: center; color: #606060;">Album of the week:</h5>
            </div>
      </div>
    </div>
    <div class="container-fluid  d-none d-md-block">
        <div class="row justify-content-center"> 
          <div class ="col-10"></div>
            <div class="col-2" style="text-align: center; color:#FFFFFF">
                <img src="joy_division_unknown_pleasures.png" class="img-fluid"></img>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>