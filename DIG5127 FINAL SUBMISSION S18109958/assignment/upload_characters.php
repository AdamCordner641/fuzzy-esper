<!DOCTYPE html>
<html lang="en">
<head>
    <title>watchr</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
    
<body style="height: auto; margin-bottom: 200px">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <span>
        <a class="navbar-brand" href="landing.php"> 
        <span style="font-family: 'Poppins', sans-serif;"><i>watchr</i></span>
        <img src="noun_DVD_950474.png" alt="logo" style="width:40px;">
        </a>
        <a href = "add_movie.php"><img src="noun_Plus_2224973.png" alt="logo" style="width:40px;" title="Add New Movie/TV Show"></a>
    </span>
    
    <form class="form-inline" action="search_results.php" method="post" enctype="multipart/form-data">
        <input class="form-control mr-sm-2" type="text" name="searchVal" placeholder="Search">
        <button class="btn btn-success" type="submit" name="upload">Search</button>
    </form>
</nav>
    
<?php
    if (isset($_POST['upload'])) {
        include 'connection.php';
        $characters = $_POST['characters'];

        if ($conn->query($sql) === TRUE) {
            ?>
            <center>
                <h3>New record created successfully.</h3><br>
            </center>
            <?php
        } else {
            ?>
            <center><h3>Connection failed: <?= $conn->connect_error;?></h3></center>
            <?php
        }
    } else {
        ?>
        <center><h3>Error: Upload not set.</h3></center>
        <?php
    }
    ?>

<footer style="background-color:#e9ecef; bottom: 0; width: 100%; left: 0; position: fixed" class="page-footer font-small pt-4">
  <div class="container rowcol-md-12 flex-center" align="center">
          <a style="text-decoration:none" class="fb-ic" href="https://www.facebook.com/">
            <font color="black">
                <i class="fa fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
              </font>
          </a>
          <a style="text-decoration:none" class="tw-ic" href="https://twitter.com/">
              <font color="black">
                <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </font>
          </a>
          <a style="text-decoration:none"  class="ins-ic" href="https://www.instagram.com">
              <font color="black">
                <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </font>
          </a>
          <a style="text-decoration:none" class="pin-ic" href="https://www.pinterest.co.uk">
              <font color="black">
                <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
              </font>
          </a> 
  </div>
    
  <div class="footer-copyright text-center py-3">© 2018 Copyright:  Adam Cordner, 18109958, Birmingham City University 2018-2019
  </div>
</footer>
</body>
    
</html>