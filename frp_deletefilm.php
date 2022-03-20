<?php
 include('config.php');  
 $dfid=$_GET['dfid'];
  $sql=pg_query($db, "Select * from ratingfilm where f_id='$dfid'");
  $num_of_row=pg_num_rows($sql);
 if($num_of_row>0)
 {
    $sql=pg_query($db, "delete from ratingfilm where f_id='$dfid'");
 }
  $sql = pg_query($db, "delete from film where f_id='$dfid'");
 header("Location:frp_removeOwnFilm.php");
?>