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
        $val = $m;
        $sql1 = "SELECT * FROM movie WHERE movieID = '$val'";
    
        $sql2 = "SELECT studio.studioID, studio.studioName FROM movie INNER JOIN studio ON movie.studioID = studio.studioID WHERE movie.movieID = '$val'";
    
        $sql3 = "SELECT director.directorID, director.directorFName, director.directorSName FROM movie INNER JOIN director ON movie.directorID = director.directorID WHERE movie.movieID = '$val'";
    
        $sql4 = "SELECT genre.genreID, genre.genreName FROM movie INNER JOIN movie_genre ON movie.movieID = movie_genre.movieID INNER JOIN genre ON movie_genre.genreID = genre.genreID WHERE movie.movieID = '$val'";
        
        $sql5 = "SELECT writer.writerID, writer.writerFName, writer.writerSName FROM movie INNER JOIN movie_writer ON movie.movieID = movie_writer.movieID INNER JOIN writer ON movie_writer.writerID = writer.writerID WHERE movie.movieID = '$val'";
    
        $sql6 = "SELECT actor.actorID, actor.actorFName, actor.actorSName, characters.characterID, characters.characterName FROM movie INNER JOIN characters ON movie.movieID = characters.movieID INNER JOIN actor ON characters.actorID = actor.actorID WHERE movie.movieID = '$val'";
    
        $sql7 = "SELECT movieImg, plot FROM movie WHERE movieID = '$val'";
    
        $sql8 = "SELECT * FROM genre";
    
        $sql9 = "SELECT directorID, directorFName, directorSName FROM director";
    
        $sql10 = "SELECT * FROM writer";
    
        $sql11 = "SELECT studioID, studioName FROM studio";
    
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);
        $num_rows4 = mysqli_num_rows($result4);
        $result5 = $conn->query($sql5);
        $num_rows5 = mysqli_num_rows($result5);
        $result6= $conn->query($sql6);
        $result7= $conn->query($sql7);
        $result8= $conn->query($sql8);
        $result9= $conn->query($sql9);
        $result10= $conn->query($sql10);
        $result11= $conn->query($sql11);

        if (($result1->num_rows > 0)) {
            // output data of each row
    ?>
    

    
    <table>
        <tr>
            <form action="update_movie.php" method="post" enctype="multipart/form-data">
            <?php
            while(($row1 =$result1->fetch_assoc())) {
                $m2 = $row1["movieID"];
            ?>
                <input type="hidden" name="movieID" value="<?= $row1["movieID"];?>">
                <td><h3><b>Name:</b> <input pattern='[^-,"]+' required type="text" name="name" value="<?= $row1["name"];?>"></h3>
                <b>Release Year:</b> <input required type="text" pattern="[0-9]+" name="year" value="<?= $row1["year"];?>"><br>
                <b>Runtime / episodes:</b> <input required type="text" pattern="[0-9]+" name="runTime" value="<?= $row1["runTime"];?>"><br>
                <b>Score: </b><select required name="score">
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
                </select>/10 <font color="#f8ff14">&#x2605;</font><br>
                    
            <b>Relevant Genre(s):</b><br> 
            <select required multiple name="genres[]">
                <?php
                while(($row4 =$result4->fetch_assoc())) {
                ?>
                <option value="<?= $row4["genreID"];?>"><?= $row4["genreName"];?></option>
                <?php
                }
                ?>
            </select><br>
            <b>New Genre(s):</b><br> 
            <select required multiple name="nGenres[]">
                <option value="None">No New Selection</option>
                <?php
                while(($row8 =$result8->fetch_assoc())) {
                ?>
                <option value="<?= $row8["genreID"];?>"><?= $row8["genreName"];?></option>
                <?php
                }
                ?>
            </select>
            <a target="_blank" href="add_genre.php"> +Add New Genre</a><br>  
            <?php
            $row7 =$result7->fetch_assoc()
            ?>
            <b>Current Poster:</b><br>
            <img class="img-thumbnail img-size-cust" src="movies/<?= $row7["movieImg"];?>" alt="poster"><br>
            <b>New Poster:</b><br>
            <input type="file" name="fileToUpload" id="fileToUpload"><br> 
            <b>Plot Synopsis:</b><br>
            <input type="text" pattern='[^-,"]+' required maxlength="500" rows = "4" name="plot" value="<?= $row7["plot"];?>"><br> 
            <?php
            $row3 =$result3->fetch_assoc();
            ?>
            <b>Director:</b> <i>(Previously <?= $row3["directorFName"];?> <?= $row3["directorSName"];?>.)</i><br>
            <select required name="director">
                <?php
                while(($row9 =$result9->fetch_assoc())) {
                ?>
                <option value="<?= $row9["directorID"];?>"><?= $row9["directorFName"];?> <?= $row9["directorSName"];?></option>
                <?php
                }
                ?>
            </select><a target="_blank" href="add_director.php"> +Add New Director</a><br>
            <b>Relevant Writer(s):</b><br> 
            <select required multiple name="writers[]">
                <?php
                while(($row5 =$result5->fetch_assoc())) {
                ?>
                <option value="<?= $row5["writerID"];?>"><?= $row5["writerFName"];?> <?= $row5["writerSName"];?></option>
                <?php
                }
                ?>
            </select><br>
            <b>New Writer(s):</b><br> 
            <select required multiple name="nWriters[]">
                <option vale="None">No New Selection</option>
                <?php
                while(($row10 =$result10->fetch_assoc())) {
                ?>
                <option value="<?= $row10["writerID"];?>"><?= $row10["writerFName"];?> <?= $row10["writerSName"];?></option>
                <?php
                }
                ?>
            </select>
            <a target="_blank" href="add_writer.php"> +Add New Writer</a><br>
            <?php
            $row2 =$result2->fetch_assoc();
            ?>
            <b>Production Co:</b> <i>(Previously <?= $row2["studioName"];?>.)</i><br>
            <select required name="studio">
                <?php
                while(($row11 =$result11->fetch_assoc())) {
                ?>
                <option value="<?= $row11["studioID"];?>"><?= $row11["studioName"];?></option>
                <?php
                }
                ?>
            </select><a target="_blank" href="add_studio.php"> +Add New Studio</a><br>
            <?php
            }
            ?>
            <input type="submit" name="upload" value="Save Changes"> 
            </form>
       </tr>
    </table> 
    
    <h4>Edit Cast</h4> <a target="_blank" href="add_character.php"> +Add New Character</a><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Actor</th>
                <th scope="col">Character</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                if ($result6->num_rows > 0) {
                while(($row6 =$result6->fetch_assoc())) {
                $m1 = $row6["actorID"];
                $m3 = $row6["characterID"];
            ?>
                <td><a href="actor_info.php?mVar=<?= $m1;?>"><font color="black"><?= $row6["actorFName"];?> <?= $row6["actorSName"];?></font></a></td>
                <td><?= $row6["characterName"];?></td>
                <td><a target="_blank" href="delete_character.php?mVar=<?= $m3;?>">-Delete Character</a></td>
            </tr>
        </tbody>
                <?php
                }
            }
            ?>
    </table>
        <?php
        } else {
       ?>
        <p>Invalid Request</p>
       <?php
        }
        $conn->close();
    ?>
            

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