<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;

       if(isset($_SESSION['f_id'])){
        $fid=$_SESSION['f_id'];
       }
       if(isset($_GET['fid'])){
        $fid=$_GET['fid'];
       }
       

       $sql=pg_query($db,"SELECT * from film where f_id='$fid'");
       while($rows=pg_fetch_assoc($sql)){
          $title= $rows['title'];
       }
       
      if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
         if(isset($_POST['selectRating'])){ 
        $sr =  $_POST['selectRating'];  

        $sql=pg_query($db, "select add_rating('$user_id','$fid','$sr');");   

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
        <style>
      table, th, td {
        border: 1px solid black;
      }

      th,td{
        color: white;
        padding-left: 20px;
        padding-top: 15px;
      }

      table {
        width: 920px;
        margin-left: 10%;
        border-color: white;
      }
    </style>
</head>
<body>
  
  <header class="header-area header-sticky">
  <?php
    include('users_header.php');
  ?>
  </header>
  <section class="contact-us" style="height: 1420px;">
  	<form action="#" method="POST" style="margin-top: 2%; margin-left: 40%;">
  		
  	<h2 style="color:white; margin-left:5%; margin-bottom: 2%;">Film Title</h2>
    <input type="text" name="film_name" value="<?php echo $title; ?>" readonly style="text-align: center;">
    <select id="selectRating" name="selectRating" style="height: 30px;">
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