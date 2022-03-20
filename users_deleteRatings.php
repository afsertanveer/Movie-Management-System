<?php
 include('config.php');  
 $dfid=$_GET['dfid'];
 $sql=pg_query($db, "delete from film where f_id='$dfid'");
 header("Location:users_removeRating.php");
?>