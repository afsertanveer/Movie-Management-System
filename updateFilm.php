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
	<style>

	</style>
</head>
<body>
	<form name="insert" action="addFilm.php" method="POST">
			<h5>Enter the movie title to be updates:  </h5>
			Title<br> <input type="text" name="title"/>
			<input type = "submit"/>
	</form>
</body>
</html>

<?php 

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$title = $_POST['title'];		
		$sql = pg_query($db, "select add_film('$title');");
	}
?>