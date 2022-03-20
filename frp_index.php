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
        border: 1px solid black;
        border-bottom-color: darkred;
      }

      th,td, tr{
        color: white;
        height: 40px;
        padding-left: 10px;
      }

      table {
        width: 920px;
        margin-left: 30%;
        border-color: black;
      }
    </style>
</head>
<body>
  
  <header class="header-area header-sticky">
  <?php
    include('frp_header.php');
  ?>
  </header>
  <section class="contact-us" style="height: 1420px;">
    <h2 style=" text-align: center; color:white; margin-top: 2%;  margin-left: 0; ">MY PROFILE</h2>
    <table style="margin-top: 35px;">
      <tr style="background-color:#a12c2f; height: 70px;">
        <th style="border:1px solid white">Name </th>
        <th style="border:1px solid white">Date Of Birth</th>
        <th style="border:1px solid white">Gender</th>
        <th style="border:1px solid white">Country</th>
        <th style="border:1px solid white">Joined On  </th>
 <!--        <th style="border:1px solid white">Role  </th> -->
      </tr>
    <?php 
      $sql = pg_query($db, "select * from users where u_id='$user_id'");
    ?>
    <?php 
      while($rows = pg_fetch_assoc($sql)){
           $fname=$rows['firstname'];
           $lname=$rows['lastname'];
           $name=$fname.' '.$lname;
           $sex = $rows['sex'];
           if($sex==1)
            {
              $sex="Male";
            }
            if($sex==2){
              $sex="Female";
            }
            if($sex==3){
              $sex="Others";
            }
            $role=$rows['role'];
            if ($role==1) {
                $role = 'Admin';
            }
            if ($role==2) {
                $role = 'User';
            }
            if ($role==3) {
                $role = 'Film Related Person';
            }
    ?>
    <tr style="background-color:#a12c2f; vertical-align:top; height: 70px;">
      <td style="border:1px solid white"> <?php echo $name; ?> </td>
      <td style="border:1px solid white"><?php echo $rows['dob']; ?></td>
      <td style="border:1px solid white"> <?php echo $sex; ?></td>
      <td style="border:1px solid white"><?php echo $rows['country']; ?></td>
      <td style="border:1px solid white"> <?php echo $rows['registered_date']; ?> </td>
<!--       <td style="border:1px solid white"> <?php echo $role; ?></td> -->
    </tr>
    <?php    } ?>
    </table>
  </section>
</html>