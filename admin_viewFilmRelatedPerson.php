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
        width: 1300px;
        margin-left: 5%;
        border-color: white;
      }
      tbody tr:nth-child(odd){
        background-color:#a12c2f;
        color: #fff;
      }
    </style>
</head>
<body>
   <?php 
    $sql = pg_query($db, "select * from view_all_films();");
   ?>
  <header class="header-area header-sticky">
  <?php
    include('admin_header.php');
  ?>
  </header>
     <section class="contact-us" style="height: 1420px;">
      <div class="container">
        <div class="row">
           <div class="col-lg-9 align-self-center">
            <div class="row">
                <div class="col-lg-12"  style="margin-top: 5%;">
                <h2 style=" text-align: center; color:white; margin-top: 5%; margin-left: 30%;">FILM RELATED PERSON LIST</h2>
                <table style="margin-top: 35px;">
                  <tr style="background-color:#a12c2f; height: 70px;">
                    <th style="border:1px solid white">Name </th>
                    <th style="border:1px solid white">Birthday</th>
                    <th style="border:1px solid white">Gender</th>
                    <th style="border:1px solid white">Country</th>
                    <th style="border:1px solid white">Joined On</th>
                  </tr>
    <?php 
      $sql = pg_query($db, "select * from view_all_frps();");
    ?>
    <?php 
      while($rows = pg_fetch_assoc($sql)){
           $fname=$rows['fname'];
           $lname=$rows['lname'];
           $name=$fname.' '.$lname;
           $sex = $rows['gender'];
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
           
    ?>
                <tr style="vertical-align:top; height: 60px;">
                  <td style="border:1px solid white"> <?php echo $name; ?> </td>
                  <td style="border:1px solid white"><?php echo $rows['birthday']; ?></td>
                  <td style="border:1px solid white"> <?php echo $sex; ?> </td>
                  <td style="border:1px solid white"> <?php echo $rows['land']; ?> </td>
                  <td style="border:1px solid white"><?php echo $rows['joined_date']; ?> </td>
                </tr>
    <?php    } ?>
                </table>
              </div>
        </div>
      </div>
    </div>
  </div>  
</section>
</body>
</html>