<!doctype html>
<html lang="en">
<head>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

        $sql = "SELECT movie.name, genre.genreName, writer.writerFName, writer.writerSName, studio.studioName, director.directorFName, director.directorSName, movie.year, movie.runTime, movie.score, movie.plot, movie.movieImg
        FROM movie 
        INNER JOIN movie_writer ON movie.movieID = movie_writer.movieID INNER JOIN writer ON movie_writer.writerID = writer.writerID INNER JOIN director ON movie.directorID = director.directorID INNER JOIN studio ON movie.studioID = studio.studioID 
        INNER JOIN movie_genre ON movie.movieID = movie_genre.movieID
        INNER JOIN genre ON movie_genre.genreID = genre.genreID
        WHERE movie.name = 'Annihilation'
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
    ?>
    
    <table>
        <tr>
        <td><b>Name</b></td>
        <td><b>Genre</b></td>
        <td><b>Writer</b></td>
        <td><b>Studio</b></td>
        <td><b>Director</b></td>
        <td><b>Year of Release</b></td>
        <td><b>Run Time (Minutes)</b></td>
        <td><b>Review Score</b></td>
        <td><b>Plot Synposis</b></td>
        <td><b>Poster</b></td>
      </tr>
    <?php
            while($row =$result->fetch_assoc()) {
                
        ?>
       <tr>
            <td><?= $row["name"];?></td>
            <td><?= $row["genreName"];?></td> 
            <td><?= $row["writerFName"];?> <?=$row["writerSName"];?></td> 
            <td><?= $row["studioName"];?></td> 
            <td><?= $row["directorFName"];?> <?=    $row["directorSName"];?></td> 
            <td><?= $row["year"];?></td> 
            <td><?= $row["runTime"];?></td> 
            <td><?= $row["score"];?></td> 
            <td><?= $row["plot"];?></td>
            <td><img src='<?= $row["movieImg"] ;?>'width="175" /></td>
       </tr>
       <?php
            }
       ?>
    </table> 
        <?php
        } else {
       ?>
    <p>0 results</p>
       <?php
        }
        $conn->close();
    ?>

</body>
</html>