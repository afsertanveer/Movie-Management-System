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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Film Management System</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<!-- <a class="navbar-brand" href="/wt/">FSR:IF</a> -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<!-- <a class="nav-link" href="meeting.php">Meeting </a> -->
				</li>
				
			</ul>
		</div>
	</nav>


<div class="card-header">	
	<table  border=1>
    	<tr>
	     	<th>Title </th>
	     	<th>Release Date</th>
	    	<th>Genre</th>
	     	<th>Minimum Age of Audience</th>
		 	<th>Production Country</th>
		 	<th>Role	</th>
     	</tr>
	<?php 
		$sql = pg_query($db, "select * from view_all_films();");
	?>
	<?php 
   	while($rows = pg_fetch_assoc($sql)){
	?>
	   <tr>
	    	<td> <?php echo $rows['title'] ; ?> </td>
			<td><?php echo $rows['release_date']; ?> </td>
	    	<td><?php echo $rows['genre']; ?></td>
			<td> <?php echo $rows['min_age_audience']; ?></td>
	    	<td><?php echo $rows['production_country']; ?></td>
			<td> <?php echo $rows['role']; ?> </td>
	   </tr>
   <?php    } ?>
   </table>


	</div>
</body>
</html>