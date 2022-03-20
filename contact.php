<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Film Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
  
    <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.php" class="logo">
                          Cineplex System
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                          <li><a href="logIn.php">LogIn</a></li>
                          <li class="scroll-to-section"><a href="contact.php">Contact Us</a></li> 
                      </ul> 
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <section class="contact-us" id="contact" style="height: 1420px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3" style="height: 500px; margin-top: 15%; margin-left: 40%;">
          <div class="right-info">
            <ul>
              <li>
                <h6>Name</h6>
                <span>SM Maruf</span>
              </li>
              <li>
                <h6>Matriculation ID</h6>
                <span>510459</span>
              </li>
               <li>
                <h6>Email Address</h6>
                <span>smmar....</span>
              </li>
               <li>
                <h6>LinkedIn URL</h6>
                <span>...</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>