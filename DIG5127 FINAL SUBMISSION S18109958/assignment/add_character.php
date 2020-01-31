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
    
        <h3>Add New Character</h3> 
        <form action="upload_character.php" method="post" enctype="multipart/form-data">
        <b>Name:</b><br> <input pattern='[^-,"]+' required type="text" name="characterName" placeholder="Name"> 
            
        <?php
        include 'connection.php';
        $sql1 = "SELECT name FROM movie";
        $result1 = $conn->query($sql1);
        ?> <br>
        <b>Appears In:</b><br> 
            <select required multiple name="movieName">
                <?php
                while(($row1 =$result1->fetch_assoc())) {
                ?>
                <option value="<?= $row1["name"];?>"><?= $row1["name"];?></option>
                <?php
                }
                ?>
            </select>
        <?php
        include 'connection.php';
        $sql2 = "SELECT actorFName, actorSName FROM actor";
        $result2 = $conn->query($sql2);
        ?> <br>
        <b>Played By:</b><br> 
            <select required multiple name="actorName">
                <?php
                while(($row2 =$result2->fetch_assoc())) {
                ?>
                <option value="<?= $row2["actorFName"];?> <?= $row2["actorSName"];?>"><?= $row2["actorFName"];?> <?= $row2["actorSName"];?></option>
                <?php
                }
                ?>
            </select> <a target="_blank" href="add_actor.php"> +Add New Actor</a><br>
        <input type="submit" value="Add Character" name="upload">
        </form>

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