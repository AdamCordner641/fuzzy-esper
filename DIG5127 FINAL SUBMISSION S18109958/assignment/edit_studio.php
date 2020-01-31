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
        $sql1 = "SELECT * FROM studio WHERE studioID = '$val'";
    
        $result1 = $conn->query($sql1);

        if (($result1->num_rows > 0)) {
    ?>
    <table>
        <tr>
            <form action="update_studio.php" method="post" enctype="multipart/form-data">
            <?php
            while(($row1 =$result1->fetch_assoc())) {
                $m2 = $row1["studioID"];
            ?>
                <input type="hidden" name="studioID" value="<?= $row1["studioID"];?>">
                <td><h3><b>Name:</b> <input pattern='[^"]+' required type="text" name="studioName" value="<?= $row1["studioName"];?>"></h3>
                <b>Headquarters:</b> <input required type="text" pattern='[^"]+' name="studioAddress" value="<?= $row1["studioAddress"];?>"><br>
                <b>Founded:</b> <input required type="text" pattern='[0-9]+' name="yearFounded" value="<?= $row1["yearFounded"];?>"><br>
                <b>Founders:</b> <input required type="text" pattern='[^"]+' name="founder" value="<?= $row1["founder"];?>"><br>
                <b>Key People:</b> <input required type="text" pattern='[^"]+' name="people" value="<?= $row1["people"];?>"><br>
            <input type="submit" name="upload" value="Save Changes"> 
            </form>
       </tr>
    </table> 
        <?php
        }
        }else {
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