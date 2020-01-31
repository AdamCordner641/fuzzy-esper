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
        $movieID = $_POST['movieID'];
        $name = $_POST['name'];
        $year = $_POST['year'];
        $runTime = $_POST['runTime'];
        $score = $_POST['score'];
        $genres = $_POST['genres'];
        $movieImg = $_FILES['fileToUpload']['name'];
            $target = "movies/".$movieImg;
        $plot = $_POST['plot'];
        $director = $_POST['director'];
        $writers = $_POST['writers'];
        $studio = $_POST['studio'];
        
        if ($movieImg != null) {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'movies/'.$_FILES['fileToUpload']['name']) === TRUE) {
            $sql = 'UPDATE movie SET name="'.$name.'",studioID="'.$studio.'",directorID="'.$director.'",year="'.$year.'",runTime="'.$runTime.'",score="'.$score.'",plot="'.$plot.'",movieImg="'.$movieImg.'" WHERE movieID="'.$movieID.'"';
            if ($conn->query($sql) === TRUE) {
                $sql2 = "SELECT movieID FROM movie WHERE name='$name' AND year='$year'";
                $result2 = $conn->query($sql2);
                while ($row2 =$result2->fetch_assoc()) {
                    $tempvar = $row2['movieID'];
                    $sqlD = "DELETE FROM movie_genre WHERE movieID='$tempvar'";
                    $sqlH = "DELETE FROM movie_writer WHERE movieID='$tempvar'";
                    $conn->query($sqlD);
                    $conn->query($sqlH);

                    foreach ($_POST['genres'] as $selectedOption) {
                        $sql3 = "INSERT INTO movie_genre(movieID,genreID) VALUES ('$tempvar','$selectedOption')";
                        if(($conn->query($sql3))===FALSE) {
                            ?>
                            <center>
                                <h3>New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                    foreach ($_POST['writers'] as $selectedOption2) {
                        $sql4 = "INSERT INTO movie_writer(movieID,writerID) VALUES ('$tempvar','$selectedOption2')";
                        if(($conn->query($sql4))===FALSE) {
                            ?>
                            <center>
                                <h3>New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                    if ($_POST['nGenres'] != "None") { 
                        #$nGenres = $_POST['nGenres']; 
                        foreach ($_POST['nGenres'] as $selectedOptionX) {
                            $sqlX = "INSERT INTO movie_genre(movieID,genreID) VALUES ('$tempvar','$selectedOptionX')";
                            if(($conn->query($sqlX))===FALSE) {
                            ?>
                            <center>
                                <h3>New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                        }
                    }
                    if ($_POST['nWriters'] != "None") {
                        #$nWriters = $_POST['nWriters'];
                        foreach ($_POST['nWriters'] as $selectedOptionY) {
                                $sqlY = "INSERT INTO movie_writer(movieID,writerID) VALUES ('$tempvar','$selectedOptionY')";
                            if(($conn->query($sqlY))===FALSE) {
                            ?>
                            <center>
                                <h3>New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                }
                }
                ?>
                <center>
                    <h3>Record updated successfully.</h3><br>
                </center>
                <?php
            } else {
                ?>
                <center><h3>Connection failed: <?= $sql;?></h3></center>
                <?php
            }
        } else {
            ?>
            <center><h3>File not set.</h3></center>
            <?php
        }
    } else {
            $sqlB = 'UPDATE movie SET name="'.$name.'",studioID="'.$studio.'",directorID="'.$director.'",year="'.$year.'",runTime="'.$runTime.'",score="'.$score.'",plot="'.$plot.'" WHERE movieID="'.$movieID.'"';
            if ($conn->query($sqlB) === TRUE) {
                $sql2 = "SELECT movieID FROM movie WHERE name='$name' AND year='$year'";
                $result2 = $conn->query($sql2);
                while ($row2 =$result2->fetch_assoc()) {
                    $tempvar = $row2['movieID'];
                    $sqlD = "DELETE FROM movie_genre WHERE movieID='$tempvar'";
                    $sqlH = "DELETE FROM movie_writer WHERE movieID='$tempvar'";
                    $conn->query($sqlD);
                    $conn->query($sqlH);

                    foreach ($_POST['genres'] as $selectedOption) {
                        $sql3 = "INSERT INTO movie_genre(movieID,genreID) VALUES ('$tempvar','$selectedOption')";
                        if(($conn->query($sql3))===FALSE) {
                            ?>
                            <center>
                                <h3>(1)New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                    foreach ($_POST['writers'] as $selectedOption2) {
                        $sql4 = "INSERT INTO movie_writer(movieID,writerID) VALUES ('$tempvar','$selectedOption2')";
                        if(($conn->query($sql4))===FALSE) {
                            ?>
                            <center>
                                <h3>(2)New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                    if ($_POST['nGenres'] != "None") {
                        #$nGenres = $_POST['nGenres']; 
                        foreach ($_POST['nGenres'] as $selectedOptionX) {
                            $sqlX = "INSERT INTO movie_genre(movieID,genreID) VALUES ('$tempvar','$selectedOptionX')";
                            if(($conn->query($sqlX))===FALSE) {
                            ?>
                            <center>
                                <h3>(3)New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                        }
                    }
                    if ($_POST['nWriters'] != "None") {
                        #$nWriters = $_POST['nWriters'];
                        foreach ($_POST['nWriters'] as $selectedOptionY) {
                                $sqlY = "INSERT INTO movie_writer(movieID,writerID) VALUES ('$tempvar','$selectedOptionY')";
                            if(($conn->query($sqlY))===FALSE) {
                            ?>
                            <center>
                                <h3>(4)New record not created successfully.</h3><br>
                            </center>
                            <?php
                        }
                    }
                }
                }
                ?>
                <center>
                    <h3>Record updated successfully.</h3><br>
                </center>
                <?php
            } else {
                ?>
                <center><h3>Connection failed (2): <?= $conn->connect_error;?></h3></center>
                <?php
            }
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