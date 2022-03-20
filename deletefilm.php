<?php
 include('config.php');  
 $dfid=$_GET['dfid'];
  $sql=pg_query($db,"SELECT * from film where f_id='$dfid'");
  while($rows=pg_fetch_assoc($sql))
  {
  	$title=$rows['title'];
  }
  $sql=pg_query($db, "Select * from ratingfilm where f_id='$dfid'");
  $num_of_row=pg_num_rows($sql);
 if($num_of_row>0)
 {
    $sql=pg_query($db, "delete from ratingfilm where f_id='$dfid'");
 }
   $sql2 = pg_query($db, "delete from film where title LIKE '%$title%' ");
 
 header("Location:admin_removeFilm.php");
?>