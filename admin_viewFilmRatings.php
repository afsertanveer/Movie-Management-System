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
  	<?php
  	$sql = pg_query($db, "select title,AVG(rating) as rating from film,ratingfilm where film.f_id=ratingfilm.f_id group by title");
		$numofrow=pg_num_rows($sql);
		if($numofrow>0){
			?>
    <h2 style=" text-align: center; color:white; margin-top: 5%; margin-right: 15%;">FILM USER RATINGS</h2>
  	<table  style="margin-top: 35px;  margin-left: 25%;">
    	<tr style="background-color:#a12c2f; height: 70px; border:1px solid white">
	     	<th style="border:1px solid white" >Title </th>
         <th style="border:1px solid white" >Rating </th>
     	</tr>
	<?php 
		
		while($rows=pg_fetch_assoc($sql)){    
     		$title=$rows['title'];
     	
	?>
	   <tr style="height: 70px; vertical-align:top; border:1px solid white;">
	    	<td style="border:1px solid white" > <?php echo $title ; ?> </td>
			<td style="border:1px solid white" ><?php echo  round($rows['rating'], 1);; ?> </td>
		
	   </tr>
   <?php }  } ?>
   </table>
  </section>
</body>
</html>