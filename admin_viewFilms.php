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
        border: 1px solid white;
        border-bottom-color: white;
        width: 1400px;
        margin: 0 15%;
      }

      th,td{
        color: white;
        padding-left: 20px;
        padding-top: 15px;
      }
      tbody tr:nth-child(odd){
        background-color:#a12c2f;
        color: #fff;
      }
    </style>
</head>
<body>
  <header class="header-area header-sticky">
  <?php
    include('admin_header.php');
  ?>
  </header>
  <section class="contact-us" style="height: 1420px;">
    <div class="container" style="max-width:100%">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <h2 style=" text-align: center; color:white; margin-top: 5%; margin-left: 10%;">FILM LIST</h2>
            <table style="margin-top: 35px;">
              <tr style="background-color:#a12c2f; height: 80px; border-bottom-color: white; border: 1px solid;">
                <th style="border:1px solid white">Movie Title </th>
                <th style="border:1px solid white">Genre</th>
                <th style="border:1px solid white">Lead Actor</th>
                <th style="border:1px solid white">Lead Actress</th>
                <th style="border:1px solid white">Director</th>
                <th style="border:1px solid white">Writer</th>
                <th style="border:1px solid white">Production Country</th>
                <th style="border:1px solid white">Released On</th>
                <th style="border:1px solid white">Minimum age of Audience</th>
                <th style="border:1px solid white">Film Added By</th>
                <!-- <th style="border:1px solid white">Role</th> -->
              </tr>
    <?php 
      $sql = pg_query($db, "select * from view_all_films();");
    ?>
    <?php 
      while($rows = pg_fetch_assoc($sql)){
      	$uid= $rows['filmaddedby'];

      		$sql2 = pg_query($db, "select * from users where u_id='$uid'");
      		while($rows1=pg_fetch_assoc($sql2)){
      			$fn=$rows1['firstname'];
      			$ln=$rows1['lastname'];
      			$name=$fn.' '.$ln;
      			$role=$rows1['role'];
      			if($role==1)
      			{
      				$set_role="Admin";
      			}
      			if($role==2){
      				$set_role="Users";
      			}
      			if($role==3)
      			{
      				$set_role="Film Related Person";
      			}
      		}
    ?>
            <tr style="vertical-align:top;border-bottom-color: white; border: 1px solid; height: 80px;">
              <td style="border:1px solid white"> <?php echo $rows['mov_title'] ; ?> </td>
              <td style="border:1px solid white"><?php echo $rows['genre_name']; ?></td>
              <td style="border:1px solid white"> <?php echo $rows['lead_actor']; ?> </td>
              <td style="border:1px solid white"> <?php echo $rows['lead_actress']; ?> </td>
              <td style="border:1px solid white"> <?php echo $rows['directr']; ?> </td>
              <td style="border:1px solid white"> <?php echo $rows['writr']; ?> </td>
              <td style="border:1px solid white"><?php echo $rows['pro_country']; ?></td>
              <td style="border:1px solid white"><?php echo $rows['released_date']; ?> </td>
              <td style="border:1px solid white"> <?php echo $rows['min_audience_age']; ?></td>
              <td style="border:1px solid white"> <?php echo $name; ?></td>
              <!-- <td style="border:1px solid white"> <?php echo $set_role; ?></td> -->
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