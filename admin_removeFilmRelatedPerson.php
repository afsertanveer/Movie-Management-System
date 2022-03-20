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
      table{
         border: 1px solid white;
         border-bottom-color: darkred;
         width: 1200px;
         border-color: white;
         border-radius: 10px;
      }

      th,td, tr{
         border:5px solid white;
         color: white;
         height: 40px;
         width: 250px;
         padding-left: 10px;
         padding-top: 5px;
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
      <div class="container">
          <div class="row">
             <div class="col-lg-9 align-self-center">
                <div class="row">
                    <div class="col-lg-12"  style="margin-top: 10%; margin-left: 15%;">
                     <h2 style=" text-align: center; color:white">DELETE FILM RELATED PERSON</h2>
                     <table  style="margin-top: 25px;">
                       <tr style="background-color:#a12c2f; height: 60px; border:1px solid white">
                            <th style="border:1px solid white" >Name </th>
                           <th style="border:1px solid white" >Country </th>
                            <th style="border:1px solid white" >Registered Date</th>
                            <th style="border:1px solid white" >DOB</th>
                            <th style="border:1px solid white" >Delete  </th>
                           </tr>
    <?php 
        $sql = pg_query($db, "select * from users where role=3");
    ?>
    <?php 
    while($rows = pg_fetch_assoc($sql)){
         $duid=$rows['u_id'];
         $fname=$rows['firstname'];
         $lname=$rows['lastname'];
         $name=$fname.' '.$lname;
         
    ?>
                     <tr style="vertical-align:top; border:1px solid white;">
                        <td style="border:1px solid white" > <?php echo $name ; ?> </td>
                        <td style="border:1px solid white" ><?php echo $rows['country']; ?> </td>
                        <td style="border:1px solid white" ><?php echo $rows['registered_date']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['dob']; ?></td>
                        <td style="border:1px solid white" ><a href="deletefrp.php?duid=<?php echo $duid;?>">Delete</a></td>
                     </tr>
   <?php    } ?>
                  </table>
               </div>
            </div>
        </div>
         </div>
      </div>    
   </section>  
   </section>
</body>
</html>