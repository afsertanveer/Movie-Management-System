<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['m_title'])){
            $mt=strtolower($_POST['m_title']);          
            $sql=pg_query($db,"Select f_id from film where LOWER(title)='$mt' AND filmaddedbyid = '$user_id' ");
            $nor=pg_num_rows($sql);
            if($nor>0)
            {
              while($row=pg_fetch_assoc($sql)){
                $id=$row['f_id'];
              }
              header("location:filmUpdatedByFrp.php?fid=".$id);
            }else{
              echo "<script>alert('searched name is not avalable')</script>";
            }

          }

       }
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
 <?php
    include('frp_header.php');

  ?> 
</header>
  <section class="contact-us" id="contact" style="height: 1420px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12"  style="margin-top: 10%; margin-left: 25%;">
                <form id="contact" action="#" method="post" style=" margin-left:1%;">
                        <div class="row">
                          <div class="col-lg-12" style="height:50px;">
                            <h2>Update Movie</h2>
                          </div>
                          <div class="col-lg-4">
                            <fieldset>
                              <LABEL>Movie Title</LABEL>
                              <input name="m_title" type="text" style="width: 500px; margin-top:5px">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" name='someAction' class="button">SEARCH</button>
                            </fieldset>
                          </div>
                        </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>