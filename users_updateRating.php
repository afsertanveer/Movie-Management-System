<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;

      
       if(isset($_GET['fid'])){
        $rfid=$_GET['fid'];
       }
       

       $sql=pg_query($db,"SELECT * from ratingfilm where rf_id='$rfid'");
       while($rows=pg_fetch_assoc($sql)){
          $f_id= $rows['f_id'];
          $r=$rows['rating'];
       }
       $sql1=pg_query($db,"Select * from film where f_id='$f_id'");
       while($rows1=pg_fetch_assoc($sql1)){
        $t=$rows1['title'];
       }
       
      if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
         if(isset($_POST['selectRating'])){ 
        $sr =  $_POST['selectRating'];  

        $sql=pg_query($db,"Update ratingfilm set rating='$sr' where rf_id='$rfid' ");   

         header("Location:users_viewRatings.php");
         
      }
      }

   ?>

<!-- Show profile of the frp here --><!DOCTYPE html>
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
  <?php
    include('users_header.php');
  ?>
  </header>
  <section class="contact-us" style="height: 1420px;">
  	<form action="#" method="POST">
  		
  	<h6 style="color:white">Film Title</h6> <input type="text" name="film_name" value="<?php echo $t; ?>" readonly style="text-align: center;">
    <select id="selectRating" name="selectRating" >
     <option value='<?php echo $r; ?>' selected="selected"><?php echo $r; ?></option> 
  <option value="1">1</option>
  <option value="1.5">1.5</option>
  <option value="2">2</option>
  <option value="2.5">2.5</option>
  <option value="2">3</option>
  <option value="3.5">3.5</option>
  <option value="4">4</option>
  <option value="4.5">4.5</option>
  <option value="5">5</option>
</select>
  	<input type="submit" name="search">

  	</form>
  </section>
</body>
</html>