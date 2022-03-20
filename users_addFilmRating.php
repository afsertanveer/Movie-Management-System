<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;

        if ($_SERVER["REQUEST_METHOD"] == "POST")
	   {
         if(isset($_POST['film_name'])){ 
	      $fn =  strtolower($_POST['film_name']);      
	      
         $sql = pg_query($db, "Select * from film where LOWER(title)='$fn'");
         $num_of_rowf=pg_num_rows($sql);
         if($num_of_rowf>0){
         	while($rows=pg_fetch_assoc($sql)){

         	$_SESSION['f_id']=$rows['f_id'];
         	 header("Location:addrating.php");
         	}
         }
         else
         {
         	echo '<script>alert("Movie you searched is not available")</script>';
         }

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
  	<form action="#" method="POST" style="margin-top: 2%; margin-left: 40%;">
  		
  	<h6 style="color:white;">Search Film</h6> <input type="text" name="film_name" >
  	<input type="submit" name="search">

  	</form>

	<?php 
		$sql = pg_query($db, "select * from film where f_id NOT IN (select f_id from ratingfilm where u_id='$user_id')");
	 	$num_of_row=pg_num_rows($sql);
	 	if($num_of_row>0){
   
	?>
  	<table  style="margin-top: 2%; margin-left: 30%;">

    	<tr style="background-color:#a12c2f; height: 70px; border:1px solid white">

	     	<th style="border:1px solid white" >Title </th>
         <th style="border:1px solid white" >Country </th>
	     	<th style="border:1px solid white" >Genre</th>
	    	<th style="border:1px solid white" >Releasing Date</th>
	    	<th style="border:1px solid white" >Current Rating</th>
	     	<th style="border:1px solid white" >Add Rating</th>
     	</tr>
     	<?php
     			while($rows = pg_fetch_assoc($sql)){
         
         		$frid=$rows['f_id'];
         		$sql2=pg_query($db,"select avg(rating) AS rating from ratingfilm where f_id='$frid'");
         		$nor=pg_num_rows($sql2);
         		if($nor==0)
         		{
         		$avgRating="Not Rated yet";
         		}else{
         			while($rows2=pg_fetch_assoc($sql2))
         			{
         				$avgRating = round($rows2['rating'], 1);
         			}
         		}
         	?>
	   <tr style="background-color:#a12c2f; vertical-align:top; border:1px solid white; height: 70px;">
	    	<td style="border:1px solid white" > <?php echo $rows['title'] ; ?> </td>
			<td style="border:1px solid white" ><?php echo $rows['productioncountry']; ?> </td>
	    	<td style="border:1px solid white" ><?php echo $rows['genre']; ?></td>
			<td style="border:1px solid white" > <?php echo $rows['releasedate']; ?></td>
			<td style="border:1px solid white" > <?php echo $avgRating; ?></td>
	    	<td style="border:1px solid white" ><a href="addrating.php?fid=<?php echo $frid;?>">Add Rating</a></td>
		
	   </tr>
   <?php   } } ?>
   </table>
  </section>
</body>
</html>
