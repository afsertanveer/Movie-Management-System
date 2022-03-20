<?php
include('config.php');  
session_start();
$role=$_SESSION['role'];
?>
<?php
$sql2 = pg_query($db, "Select u_id from users order by u_id desc LIMIT 1");
      while ($row = pg_fetch_assoc($sql2)) {
          $u_id=$row['u_id'];

      }
      $_SESSION['getuid']=$u_id;

      $sql3=pg_query($db,"INSERT INTO public.filmrelatedperson(role, u_id) VALUES ('$role','$u_id' )");
      header("Location: admin_addFilmRelatedPerson.php");

    ?>