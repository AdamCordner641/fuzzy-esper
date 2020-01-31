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
    
<body class="body-styling">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <span>
        <a class="navbar-brand" href="index.php"> 
        <span class="logo-font"><i>watchr</i></span>
        <img src="noun_DVD_950474.png" alt="logo" class="logo-width">
        </a>
        <a href = "add_movie.php"><img src="noun_Plus_2224973.png" alt="logo" class="logo-width" title="Add New Movie/TV Show"></a>
    </span>
    
    <form class="form-inline" action="search_results.php" method="post" enctype="multipart/form-data">
        <input class="form-control mr-sm-2" type="text" name="searchVal" placeholder="Search">
        <button class="btn btn-success" type="submit" name="upload">Search</button>
    </form>
</nav>
    
<?php
    if (isset($_POST['upload'])) {
        include 'connection.php';
        $name = $_POST['characterName'];
        
        $movieName = $_POST['movieName'];
        $actorName = $_POST['actorName'];
        $actorNames = explode(" ", $actorName);
        $size = sizeof($actorNames);
        $actorN1 = $actorNames[0];
        $actorN2 = $actorNames[$size-1];
        
        $sql1 = "SELECT actorID FROM actor WHERE actorFName LIKE '%$actorN1%' OR actorSName LIKE '%$actorN2%'";
        $result1 = $conn->query($sql1);
        $val1 =$result1->fetch_assoc();
        $v1 = $val1["actorID"];
        
        $sql2 = "SELECT movieID FROM movie WHERE name='$movieName'";
        $result2 = $conn->query($sql2);
        $val2 =$result2->fetch_assoc();
        $v2 = $val2["movieID"];
        
        $sql = 'INSERT INTO characters(characterName, actorID, movieID) VALUES ("'.$name.'","'.$v1.'","'.$v2.'")';

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

<footer class="c-f-style page-footer font-small pt-4">
  <div class="container rowcol-md-12 flex-center" align="center">
          <a class="no-text-deco fb-ic" href="https://www.facebook.com/">
            <font color="black">
                <i class="fa fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
              </font>
          </a>
          <a class="no-text-deco tw-ic" href="https://twitter.com/">
              <font color="black">
                <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </font>
          </a>
          <a class="no-text-deco ins-ic" href="https://www.instagram.com">
              <font color="black">
                <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
              </font>
          </a>
          <a class="no-text-deco pin-ic" href="https://www.pinterest.co.uk">
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