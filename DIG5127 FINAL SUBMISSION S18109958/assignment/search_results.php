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
    
<div class="container">
    <div class="page-header">
        <h1>Results</h1>
    </div>
        <?php
        if (isset($_POST['upload'])) {
            include 'connection.php';
            $val = $_POST['searchVal'];
            $sql1 = "SELECT movieID, name, year FROM movie WHERE name LIKE '%$val%'";
            $sql2 = "SELECT actorID, actorFName, actorSName FROM actor WHERE actorFName LIKE '%$val%' OR actorSName LIKE '%$val%'";
            $sql3 = "SELECT studioID, studioName FROM studio WHERE studioName LIKE '%$val%'";
            $sql4 = "SELECT writerID, writerFName, writerSName FROM writer WHERE writerFName LIKE '%$val%' OR writerSName LIKE '%$val%'";
            $sql5 = "SELECT directorID, directorFName, directorSName FROM director WHERE directorFName LIKE '%$val%' OR directorSName LIKE '%$val%'";
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql2);
            $result3 = $conn->query($sql3);
            $result4 = $conn->query($sql4);
            $result5 = $conn->query($sql5);

            if (($result1->num_rows > 0)or($result2->num_rows > 0)or($result3->num_rows > 0)or($result4->num_rows > 0)or($result5->num_rows > 0)) {
                // output data of each row
        ?>

        <table class="table">
           <tr>
               <td>
                <?php
                while(($row1 =$result1->fetch_assoc())) {
                   $m1 = $row1["movieID"];
                ?>
                   <a href="movie_info.php?mVar=<?= $m1;?>"> <font color="black"><?= $row1["name"];?> (<?= $row1["year"];?>) </font></a><br>

                <?php
                }
                while(($row2 =$result2->fetch_assoc())) {
                    $m1 = $row2["actorID"];
                ?>
                   <a href="actor_info.php?mVar=<?= $m1;?>"> <font color="black"> <?= $row2["actorFName"];?> <?= $row2["actorSName"];?></font></a><br>

                <?php
                }
                while(($row3 =$result3->fetch_assoc())) {
                    $m1 = $row3["studioID"];
                ?>
                   <a href="studio_info.php?mVar=<?= $m1;?>"> <font color="black"><?= $row3["studioName"];?></font></a><br>

                <?php
                }
                while(($row4 =$result4->fetch_assoc())) {
                    $m1 = $row4["writerID"];
                ?>
                   <a href="writer_info.php?mVar=<?= $m1;?>"> <font color="black"><?= $row4["writerFName"];?> <?= $row4["writerSName"];?> (Writer)</font></a><br>

                <?php
                }
                while(($row5 =$result5->fetch_assoc())) {
                    $m1 = $row5["directorID"];
                ?>
                   <a href="director_info.php?mVar=<?= $m1;?>"> <font color="black"><?= $row5["directorFName"];?> <?= $row5["directorSName"];?> (Director)</font></a><br>

                <?php
                }
                ?>
               </td>
           </tr>
        </table> 
            <?php
            } else {
           ?>
        <p>0 Results</p>
           <?php
            }
            $conn->close();

        } else {
            echo "Error: Upload not set.";
        }
        ?>
    
    </div>

</body>
    
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
    
</html>