<?php
 include('config.php');  
 $duid=$_GET['duid'];
 echo $duid; 
 $sql=pg_query($db, "Select * from users where u_id='$duid'");
    while($rows = pg_fetch_assoc($sql)){
         $fname=$rows['firstname'];
         $lname=$rows['lastname'];
         $name=$fname.' '.$lname;
  $sql2=pg_query($db, "select remove_frp('$name');");
  }
$sql3=pg_query($db, "delete from users where u_id='$duid'");      
 header("Location:admin_removeFilmRelatedPerson.php");
?>