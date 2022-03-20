<!-- <?php

session_start();
isset($_SESSION["username"]);
$_SESSION["login"]=1;
?> -->

<!-- needs to be fixed -->

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
          <div class="container" >
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="frp_index.php" class="logo">
                          Cineplex System
                      </a>
                      <ul class="nav">
                          <li class="has-sub">
                            <a href="javascript:void(0)">Films</a>
                            <ul class="sub-menu">
                                <li><a href="frp_addFilm.php">Add Film</a></li><li>
                                  <a href="frp_removeOwnFilm.php">Remove My Film</a></li>
                                <li><a href="frp_updateFilm.php">Update Film</a></li>
                                <li><a href="frp_viewOwnFilms.php">View My Films</a></li>
                            </ul>
                          </li>
                          <li><a href="frp_updateProfile.php">Update Profile</a></li>
                           
                          <li><a href="logOut.php">Log Out</a></li>
                      </ul> 
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
</body>
</html>