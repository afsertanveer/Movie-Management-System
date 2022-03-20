<?php
 include('config.php');  
 $duid=$_GET['duid'];
 echo $duid; 
 $sql=pg_query($db, "Select * from ratingfilm where u_id='$duid'");
 $num_of_row=pg_num_rows($sql);
 if($num_of_row>0)
 {
    $sql=pg_query($db, "delete from ratingfilm where u_id='$duid'");
 }
 
 $sql = pg_query($db, "delete from users where u_id='$duid'");
 header("Location:admin_removeUser.php");
?>