<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;
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
        border: 1px solid white;
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
    <?php
    $sql = pg_query($db, "select * from get_film_filmrate('$user_id');");
    $numofrow=pg_num_rows($sql);
    if($numofrow>0){
      ?>
    <h2 style="color:white; margin-left:40%; margin-bottom: 2%; margin-top: 2%;">MY RATED FILM LIST</h2>
    <table  style="margin-top: 2%; margin-left: 30%;">
      <tr style="background-color:#a12c2f; height: 70px; border:1px solid white">
        <th style="border:1px solid white" >Title </th>
         <th style="border:1px solid white" >Rating </th>
         <th style="border:1px solid white" >Change Rating </th>
      </tr>
  <?php 
    
    while($rows=pg_fetch_assoc($sql)){    
        $title=$rows['title'];
        $rf_id=$rows['rf_id'];
      
  ?>
     <tr style="background-color:#a12c2f; vertical-align:top; border:1px solid white; height: 70px;">
        <td style="border:1px solid white" > <?php echo $title ; ?> </td>
      <td style="border:1px solid white" ><?php echo $rows['rating']; ?> </td>
      <td style="border:1px solid black" ><a href="users_updateRating.php?fid=<?php echo $rf_id;?>">Change</a></td>
    
     </tr>
   <?php }  } ?>
   </table>
  </section>
</body>
</html>