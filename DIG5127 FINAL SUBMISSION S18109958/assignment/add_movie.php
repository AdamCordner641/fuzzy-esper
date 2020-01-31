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
    
<div>
    <h3>Add a New Movie or TV Show</h3>
    <form action="upload_movie.php" method="post" enctype="multipart/form-data">
        <i>Movie 
        <input required type="Radio" name="classification" value="Movie"></i> or <i>
        TV Show 
        <input required type="Radio" name="classification" value="TV"><br></i>
        Name:<br>
        <input pattern='[^"]+' required type="text" maxlength="50" name="name"><br>
        <b>Plot Synopsis:</b><br>
        <input type="text" pattern='[^"]+'  required maxlength="500" rows = "4" name="plot"><br>
        <b>Release Year:</b><br>
        <input required type="text" pattern="[0-9]+" maxlength="4" name="year"><br>
        <b>Run time in minutes (if movie) or number of episodes (if TV show):</b><br>
        <input required type="text" pattern="[0-9]+" name="runTime"><br>
        <b>Score:</b><br>
        <select required name="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        /10<font color="#f8ff14" size="4">&#x2605;</font><br>
        <b>Upload Poster:</b><br>
        <input required type="file" name="fileToUpload" id="fileToUpload"><br>
        
        <?php
        include 'connection.php';
        $sql1 = "SELECT genreID, genreName FROM genre";
        $result1 = $conn->query($sql1);
        ?>
        <b>Select Genre(s):</b><br> 
            <select required multiple name="genres[]">
                <?php
                while(($row1 =$result1->fetch_assoc())) {
                ?>
                <option value="<?= $row1["genreID"];?>"><?= $row1["genreName"];?></option>
                <?php
                }
                ?>
            </select>
        <a target="_blank" href="add_genre.php"> +Add New Genre</a><br>
    
        <?php
        include 'connection.php';
        $sql2 = "SELECT studioID, studioName FROM studio";
        $result2 = $conn->query($sql2);
        ?>
        <b>Select Studio:</b><br> 
            <select required name="studio">
                <?php
                while(($row2 =$result2->fetch_assoc())) {
                ?>
                <option value="<?= $row2["studioID"];?>"><?= $row2["studioName"];?></option>
                <?php
                }
                ?>
            </select>
        <a target="_blank" href="add_studio.php"> +Add New Studio</a><br>
        
        <?php
        include 'connection.php';
        $sql3 = "SELECT directorID, directorFName, directorSName FROM director";
        $result3 = $conn->query($sql3);
        ?>
        <b>Select Director:</b><br> 
            <select required name="director">
                <?php
                while(($row3 =$result3->fetch_assoc())) {
                ?>
                <option value="<?= $row3["directorID"];?>"><?= $row3["directorFName"];?> <?= $row3["directorSName"];?></option>
                <?php
                }
                ?>
            </select>
        <a target="_blank" href="add_director.php"> +Add New Director</a><br>
        
        <?php
        include 'connection.php';
        $sql4 = "SELECT writerID, writerFName, writerSName FROM writer";
        $result4 = $conn->query($sql4);
        ?>
        <b>Select Writer(s):</b><br> 
            <select required multiple name="writers[]">
                <?php
                while(($row4 =$result4->fetch_assoc())) {
                ?>
                <option value="<?= $row4["writerID"];?>"><?= $row4["writerFName"];?> <?= $row4["writerSName"];?></option>
                <?php
                }
                ?>
            </select>
        <a target="_blank" href="add_writer.php"> +Add New Writer</a><br>
        
        
        <input type="submit" name="upload" value="Submit"> 
        
    </form> 
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
