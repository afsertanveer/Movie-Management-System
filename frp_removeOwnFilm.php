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
        border-bottom-color: white;
      }

      th,td{
        color: white;
        padding-left: 15px;
        padding-top: 15px;
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
      <div class="container" style="margin-left: 15%;">
          <div class="row">
             <div class="col-lg-9 align-self-center">
                <div class="row">
                    <div class="col-lg-12"  style="margin-top: 10%;">
                    <form id="contact" action="" method="post" style=" margin-left:40%;">
                        <div class="row">
                          <div class="col-lg-12" style="height:50px;">
                            <h2>ENTER MOVIE TITLE TO BE REMOVED</h2>
                          </div>
                          <div class="col-lg-4">
                            <fieldset>
                              <p>Movie Title</p>
                              <input name="title" type="text" id="title" style="width: 500px; margin-top:5px">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="button">REMOVE</button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                    <h2 style=" text-align: center; color:white; margin-top:10%; margin-left: 35%;">DELETE FILM LIST</h2>
                     <table  style="margin-top: 25px; width: 1700px;">
                       <tr style="background-color:#a12c2f; border:1px solid white; height: 80px;">
                            <th style="border:1px solid white" >Movie Title </th>
                            <th style="border:1px solid white" >Release Date </th>
                            <th style="border:1px solid white" >Production Country </th>
                            <th style="border:1px solid white" >Minimum Age Of Audience </th>
                            <th style="border:1px solid white" >Lead Actor </th>
                            <th style="border:1px solid white" >Lead Actress </th>
                            <th style="border:1px solid white" >Director </th>
                            <th style="border:1px solid white" >Writer </th>
                            <th style="border:1px solid white" >Genre </th>
                            <th style="border:1px solid white" >Delete </th>
                        </tr>

                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                      $title = $_POST['title'];    
                      $sql = pg_query($db, "select * from film where title='$title' AND filmaddedbyid ='$user_id';");
                      $num_of_row=pg_num_rows($sql);
                      while($rows = pg_fetch_assoc($sql)){
                        $fid= $rows['f_id'];
                      }
                       if($num_of_row>0)
                       {
                          $sql2 = pg_query($db, "delete from film where title LIKE '%$title%'");  
                          $sql=pg_query($db, "delete from film where title='$title'");
                       }
                        $sql = pg_query($db, "delete from ratingfilm where f_id='$fid'");
                    }
                ?>
                <?php 
                    $sql = pg_query($db, "select * from film where filmaddedbyid ='$user_id';");
                ?>
                <?php 
                while($rows = pg_fetch_assoc($sql)){    
                     $dfid=$rows['f_id'];    
                ?>
                    <tr style="background-color:#a12c2f; vertical-align:top; border:1px solid white; height: 70px;">
                        <td style="border:1px solid white" > <?php echo $rows['title']; ?> </td>
                        <td style="border:1px solid white" ><?php echo $rows['releasedate']; ?> </td>
                        <td style="border:1px solid white; padding-left: 80px;" ><?php echo $rows['productioncountry']; ?></td>
                        <td style="border:1px solid white; padding-left: 120px;" > <?php echo $rows['minageaudience']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['leadactor']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['leadactress']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['director']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['writer']; ?></td>
                        <td style="border:1px solid white" > <?php echo $rows['genre']; ?></td>
                        <td style="border:1px solid white" ><a href="frp_deletefilm.php?dfid=<?php echo $dfid;?>">Delete</a></td>
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
