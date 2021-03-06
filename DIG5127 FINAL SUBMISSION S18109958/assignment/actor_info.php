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
        isset($_POST['mVar']) ? $m = $_POST['mVar'] : $m = $_GET['mVar'];
        include 'connection.php';
        $val1 = $m;
        $sql = "SELECT actorFName, actorSName FROM actor WHERE actorID = '$m'";
        $result = $conn->query($sql);
        $row =$result->fetch_assoc();
        $val2 = $row['actorFName'];
        $val3 = $row['actorSName'];
        $sql1 = "SELECT * FROM actor WHERE actorID = '$val1'";
        $sql2 = "SELECT movie.movieID, movie.name, movie.year FROM actor INNER JOIN characters ON actor.actorID = characters.actorID INNER JOIN movie ON characters.movieID = movie.movieID WHERE actorFName = '$val2' AND actorSName = '$val3'";
    
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
    ?>
        
    <table>
    <tr>

        <?php
        while(($row1 =$result1->fetch_assoc())) {
            $m2 = $row1["actorID"];
        ?>
        <td><h3><?= $row1["actorFName"];?> <?= $row1["actorSName"];?></h3>
        <a href="edit_actor.php?mVar=<?= $m2;?>"> +Edit This Record</a><br>
        Date of Birth: <?= $row1["actorDOB"];?>
        <br><img class="img-thumbnail img-size-cust" src="actors/<?= $row1["actorImg"];?>" alt="actor_face"><br>
        <b>Projects: </b><br>
        <?php
        }
        if ($result2->num_rows > 0) {
            while(($row2 =$result2->fetch_assoc())) {
            $m1 = $row2["movieID"];
            ?>
            <a href="movie_info.php?mVar=<?= $m1;?>"> <font color="black"> <?= $row2["name"];?> (<?= $row2["year"];?>) </font> </a><br>
            <?php
            }
        }
        ?>
    
        </td>
        </tr>
    </table>
<a href="delete_actor.php?mVar=<?= $m2;?>"> +Delete This Record</a><br>
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