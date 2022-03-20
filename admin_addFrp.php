<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;
   ?>

<?php
  
      $sql2 = pg_query($db, "Select u_id from users order by u_id LIMIT 1");
      while ($row = pg_fetch_assoc($sql2)) {
          $u_id=$row['u_id'];
      }

      $sql3=pg_query($db,"select add_role_in_frp('$role','$u_id' );");
      header("Location: admin_addFilmRelatedPerson.php");

    ?>